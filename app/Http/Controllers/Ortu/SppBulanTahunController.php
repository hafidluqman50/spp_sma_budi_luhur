<?php

namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\KolomSpp;
use App\Models\HistoryProsesSpp;
use App\Models\Kantin;
use Auth;

class SppBulanTahunController extends Controller
{
    public function index($id)
    {
        $title           = 'SPP Bulan Tahun';
        $siswa           = Spp::getRowById($id);
        $spp_bulan_tahun = new SppBulanTahun;
        $spp_detail      = new SppDetail;
        $tahun           = SppBulanTahun::leftJoin('kantin','spp_bulan_tahun.id_kantin','=','kantin.id_kantin')
                                        ->where('id_spp',$id)
                                        ->groupBy('tahun')
                                        ->orderBy('tahun','ASC')
                                        ->get();

        return view('Ortu.spp-bulan-tahun',compact('title','id','siswa','spp_bulan_tahun','tahun','spp_detail'));
    }
}
