<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;

class SppBayarController extends Controller
{
    public function index($id,$id_spp_bayar_data)
    {
        $title = 'Kepsek | SPP Bayar';
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

        return view('Kepsek.spp-bayar.spp-bayar',compact('title','id','id_spp_bayar_data','siswa','tahun','spp_bayar_detail','spp_bayar'));
    }

    public function delete($id,$id_spp_bayar_data,$id_spp_bayar)
    {
        
    }
}
