<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\SppBayarData;
use App\Models\PemasukanKantin;
use App\Models\SppBulanTahun;
use App\Models\KolomSpp;
use App\Models\SppDetail;

class SppBayarDetailController extends Controller
{
    public function index($id,$id_spp_bayar_data,$id_spp_bayar)
    {
        $title = 'Admin | Spp Bayar Data';
        $siswa = SppBayar::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                            ->join('spp_bayar_data','spp_bayar.id_spp_bayar_data','=','spp_bayar_data.id_spp_bayar_data')
                            ->join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                            ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('spp.id_spp',$id)
                            ->firstOrFail();

        return view('Admin.spp-bayar.detail',compact('title','id','id_spp_bayar_data','id_spp_bayar','siswa'));
    }

    public function delete($id,$id_spp_bayar_data,$id_spp_bayar,$id_spp_bayar_detail)
    {
        $get_spp_bayar_detail = SppBayarDetail::join('spp_bayar','spp_bayar_detail.id_spp_bayar','=','spp_bayar.id_spp_bayar')
                                                ->where('id_spp_bayar_detail',$id_spp_bayar_detail)
                                                ->firstOrFail();

        $get_spp_bayar_data = SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)
                                            ->firstOrFail();

        $new_nominal_spp = $get_spp_bayar_detail->total_biaya - $get_spp_bayar_data->total_biaya;

        SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)
                    ->update(['total_biaya' => $new_nominal_spp]);

        SppBayarDetail::where('id_spp_bayar',$id_spp_bayar)
                        ->where('id_spp_bayar_detail',$id_spp_bayar_detail)
                        ->delete();

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_spp_bayar_data.'/detail/'.$id_spp_bayar)->with('message','Berhasil Menghapus Data');
    }

    public function returBayar($id,$id_spp_bayar_data,$id_spp_bayar,$id_spp_bayar_detail)
    {
        $get_spp_bayar_detail__ = SppBayarDetail::join('spp_bayar','spp_bayar_detail.id_spp_bayar','=','spp_bayar.id_spp_bayar')
                                                ->where('id_spp_bayar_detail',$id_spp_bayar_detail)
                                                ->firstOrFail();

        $get_spp_bayar_data__ = SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)
                                            ->firstOrFail();

        $new_nominal_spp = $get_spp_bayar_detail__->nominal_bayar - $get_spp_bayar_data__->total_biaya;

        SppBayarData::where('id_spp_bayar_data',$id_spp_bayar_data)
                    ->update(['total_biaya' => $new_nominal_spp]);

        $get_spp_bayar = SppBayar::where('id_spp_bayar',$id_spp_bayar)->get();

        foreach ($get_spp_bayar as $key => $value) {
            $get_spp_bayar_detail = SppBayarDetail::where('id_spp_bayar_detail',$id_spp_bayar_detail)->get();
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
            }
        }

        SppBayarDetail::where('id_spp_bayar_detail',$id_spp_bayar_detail)
                    ->update(['nominal_bayar' => 0]);

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_spp_bayar_data.'/detail/'.$id_spp_bayar)->with('message','Berhasil Retur Bayar');
    }
}
