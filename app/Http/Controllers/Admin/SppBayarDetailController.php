<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;

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
        SppBayarDetail::where('id_spp_bayar',$id_spp_bayar)
                        ->where('id_spp_bayar_detail',$id_spp_bayar_detail)
                        ->delete();

        return redirect('/admin/spp/pembayaran/'.$id.'/lihat-pembayaran/'.$id_spp_bayar_data.'/detail/'.$id_spp_bayar)->with('message','Berhasil Menghapus Data');
    }
}
