<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\PemasukanKantin;
use App\Models\SppBulanTahun;
use App\Models\KolomSpp;
use App\Models\SppDetail;

class SppBayarController extends Controller
{
    public function index($id,$id_spp_bayar_data)
    {
        $title = 'Admin | SPP Bayar';
        $siswa = Spp::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('id_spp',$id)
                            ->firstOrFail();

        $tahun = SppBayar::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                            ->where('spp_bayar.id_spp_bayar_data',$id_spp_bayar_data)
                            ->groupBy('tahun')
                            ->orderBy('tahun','ASC')
                            ->get();

        $spp_bayar = new SppBayar;
        $spp_bayar_detail = new SppBayarDetail;

        return view('Admin.spp-bayar.spp-bayar',compact('title','id','id_spp_bayar_data','siswa','tahun','spp_bayar_detail','spp_bayar'));
    }

    public function delete($id,$id_spp_bayar_data,$id_spp_bayar)
    {
        $sum = SppBayarDetail::where('id_spp_bayar',$id_spp_bayar)->sum('nominal_bayar');
        $get_total_biaya = SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)->firstOrFail()->total_biaya;
        $new_total_biaya = $get_total_biaya - $sum;

        SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)->update(['total_biaya' => $new_total_biaya]);

        SppBayar::where('id_spp_bayar',$id_spp_bayar)->delete();

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_spp_bayar_data)->with('message','Berhasil Hapus Data');
    }

    public function returBayar($id,$id_spp_bayar_data,$id_spp_bayar)
    {
        $sum = SppBayarDetail::where('id_spp_bayar',$id_spp_bayar)->sum('nominal_bayar');
        $get_total_biaya = SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)->firstOrFail()->total_biaya;
        $new_total_biaya = $get_total_biaya - $sum;

        SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)->update(['total_biaya' => $new_total_biaya]);

        $get_spp_bayar = SppBayar::where('id_spp_bayar',$id_spp_bayar)->get();

        foreach ($get_spp_bayar as $key => $value) {
            $get_spp_bayar_detail = SppBayarDetail::where('id_spp_bayar',$value->id_spp_bayar)->get();
            foreach ($get_spp_bayar_detail as $index => $val) {
                $check_kolom_spp = KolomSpp::where('id_kolom_spp',$val->id_kolom_spp)->firstOrFail()->slug_kolom_spp;

                $get_spp_detail = SppDetail::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                                            ->where('id_kolom_spp',$val->id_kolom_spp)
                                            ->firstOrFail();
                
                if ($check_kolom_spp == 'uang-makan') {
                    if ($val->id_kantin == '') {
                        $get_kantin_spp = SppBulanTahun::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)->firstOrFail();
                        $get_pemasukan_kantin = PemasukanKantin::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                                                                ->where('id_kantin',$get_kantin_spp->id_kantin)
                                                                ->firstOrFail();
                    }
                    else {
                        $get_pemasukan_kantin = PemasukanKantin::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                                                                ->where('id_kantin',$val->id_kantin)
                                                                ->firstOrFail();
                    }

                    $new_nominal_pemasukan = $val->nominal_bayar - $get_pemasukan_kantin->nominal_pemasukan;
                    
                    $pemasukan_retur = [
                        'nominal_pemasukan' => $new_nominal_pemasukan
                    ];
                    PemasukanKantin::where('id_pemasukan_kantin',$get_pemasukan_kantin->id_pemasukan_kantin)
                                    ->update($pemasukan_retur);
                }

                $nominal_spp = $get_spp_detail->bayar_spp - $val->nominal_bayar;
                $sisa_bayar  = $get_spp_detail->sisa_bayar + $val->nominal_bayar;

                $data_spp_detail = ['bayar_spp' => $nominal_spp, 'sisa_bayar' => $sisa_bayar, 'status_bayar' => 0];

                SppDetail::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                        ->where('id_kolom_spp',$val->id_kolom_spp)
                        ->update($data_spp_detail);

                SppBayarDetail::where('id_spp_bayar_detail',$val->id_spp_bayar_detail)
                            ->update(['nominal_bayar' => 0]);
            }
        }

        // SppBayar::where('id_spp_bayar',$id_spp_bayar)
        //             ->delete();

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_spp_bayar)->with('message','Berhasil Retur Bayar');
    }
}
