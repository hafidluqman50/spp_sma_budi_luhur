<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\Petugas;

class SppBayarDataController extends Controller
{
    public function index($id)
    {
        $title = 'Admin | Spp Bayar Data';
        $siswa = Spp::join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                            ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                            ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                            ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                            ->where('id_spp',$id)
                            ->firstOrFail();

        return view('Admin.spp-bayar.main',compact('title','id','siswa'));
    }

    public function delete($id,$id_spp_bayar_data)
    {
        SppBayarData::where('id_spp',$id)
                    ->where('id_spp_bayar_data',$id_spp_bayar_data)
                    ->delete();

        return redirect('/admin/spp/pembayaran/'.$id)->with('message','Berhasil Menghapus Data');
    }

    public function cetakStruk($id,$id_spp_bayar_data)
    {
        $spp_bayar = SppBayarData::join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                                ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                ->where('spp.id_spp',$id)
                                ->where('id_spp_bayar_data',$id_spp_bayar_data)
                                ->firstOrFail();

        $untuk_pembayaran = SppBayar::bulanPembayaran($id,$id_spp_bayar_data);
        $petugas          = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();

        return view('Admin.spp-bayar.struk',compact('id','id_spp_bayar_data','spp_bayar','untuk_pembayaran','petugas'));
    }

    public function returBayar($id,$id_spp_bayar_data)
    {
        $get_spp_bayar = SppBayar::where('id_spp_bayar_data',$id_spp_bayar_data)->get();

        foreach ($get_spp_bayar as $key => $value) {
            $get_spp_bayar_detail = SppBayarDetail::where('id_spp_bayar_detail',$value->id_spp_bayar)->get();
            foreach ($get_spp_bayar_detail as $index => $val) {
                $get_spp_detail = SppDetail::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                                            ->where('id_kolom_spp',$val->id_kolom_spp)
                                            ->firstOrFail();
                $nominal_spp = $get_spp_detail->nominal_bayar - $val->nominal_bayar;
                $sisa_bayar  = $get_spp_detail->sisa_bayar + $val->nominal_bayar;

                $data_spp_detail = ['nominal_bayar' => $nominal_spp, 'sisa_bayar' => $sisa_bayar];

                SppDetail::where('id_spp_bulan_tahun',$value->id_spp_bulan_tahun)
                        ->where('id_kolom_spp',$val->id_kolom_spp)
                        ->update($data_spp_detail);
            }
        }

        SppBayarData::where('id_spp',$id)
                    ->where('id_spp_bayar_data',$id_spp_bayar_data)
                    ->delete();

        return redirect('/admin/spp/pembayaran/'.$id)->with('message','Berhasil Retur Bayar');
    }
}
