<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SppBulanTahun;
use App\Models\SppDetail;
use App\Models\KolomSpp;

class SppBulanTahunController extends Controller
{
    public function index($id)
    {
        $title = 'SPP Bulan Tahun';
        $siswa = SppBulanTahun::getSiswa($id);

        return view('Admin.spp-bulan-tahun.main',compact('title','id','siswa'));
    }
}
