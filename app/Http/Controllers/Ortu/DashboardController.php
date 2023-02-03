<?php

namespace App\Http\Controllers\Ortu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | Ortu';
        $siswa = Siswa::where('nisn',Auth::user()->username)->firstOrFail();

        return view('Ortu.dashboard',compact('title','siswa'));
    }

    public function spp($id)
    {
        $title = 'SPP | Ortu';

        return view('Ortu.spp',compact('title','id'));
    }

    public function detailSpp($id,$id_detail)
    {
        $title = 'Detail SPP | Ortu';

        return view('Ortu.detail-spp',compact('title','id','id_detail'));
    }

    public function panduanNotifikasi()
    {
        $title = 'Panduan Notifikasi';

        return view('Ortu.panduan-notifikasi',compact('title'));
    }
}
