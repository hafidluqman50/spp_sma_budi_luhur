<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppBayarDetail;
use App\Models\HistoryProsesSpp;
use App\Models\PemasukanKantin;
use App\Models\ProfileInstansi;
use Auth;

class SppDetailController extends Controller
{
    public function index($id,$id_bulan_tahun)
    {
        $title = 'SPP Detail | Kepsek';
        $siswa = SppBulanTahun::getRowById($id_bulan_tahun);

        return view('Kepsek.spp-detail.main',compact('title','id','id_bulan_tahun','siswa'));
    }

    public function lihatPembayaran($id,$id_bulan_tahun)
    {   
        $title = 'Lihat Pembayaran';
        $siswa = SppBayar::getSiswa($id_bulan_tahun);
        
        return view('Kepsek.spp-bayar.main',compact('title','id','id_bulan_tahun','siswa'));
    }

    public function lihatPembayaranDetail($id,$id_bulan_tahun,$id_spp_bayar)
    {   
        $title = 'Lihat Pembayaran Detail | Kepsek';
        $siswa = SppBayar::getSiswa($id_bulan_tahun);
        
        return view('Kepsek.spp-bayar.detail',compact('title','id','id_bulan_tahun','siswa','id_spp_bayar'));
    }
}
