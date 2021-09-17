<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\KolomSpp;

class SppController extends Controller
{
    public function index()
    {
        $title = 'SPP | Admin';

        return view('Admin.spp.main',compact('title'));
    }

    public function tambah()
    {
        $title        = 'Tambah SPP | Admin';
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $kolom_spp    = KolomSpp::where('status_delete',0)->get();

        return view('Admin.spp.spp-tambah',compact('title','tahun_ajaran','kolom_spp'));
    }
}
