<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppDetail;
use App\Models\SppBayar;

class SppDetailController extends Controller
{
    public function index($id,$id_bulan_tahun)
    {
        $title = 'SPP Detail | Kepsek';
        $siswa = SppDetail::getSiswa($id_bulan_tahun);

        return view('Kepsek.spp-detail.main',compact('title','id','id_bulan_tahun','siswa'));
    }

    public function lihatPembayaran($id,$id_bulan_tahun)
    {   
        $title = 'Lihat Pembayaran';
        $siswa = SppBayar::getSiswa($id_bulan_tahun);
        
        return view('Kepsek.spp-bayar.main',compact('title','id','id_bulan_tahun','siswa'));
    }
}
