<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBayar;

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

        return view('Admin.spp-bayar.spp-bayar',compact('title','id','id_spp_bayar_data','siswa'));
    }

    public function delete($id,$id_spp_bayar_data,$id_spp_bayar)
    {
        
    }
}
