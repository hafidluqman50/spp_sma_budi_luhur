<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaranSekolah;
use App\Models\RincianPengajuan;

class RincianPengajuanController extends Controller
{
    public function index($id)
    {
        $title = 'Kepsek | Rincian Pengajuan';

        return view('Kepsek.rincian-pengajuan.main',compact('title','id'));
    }
}
