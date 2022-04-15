<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;
use App\Models\KolomSpp;

class RincianPengeluaranController extends Controller
{
    public function index()
    {
        $title = 'Admin | Rincian Pengeluaran';

        return view('Admin.rincian-pengeluaran.main',compact('title'));
    }

    public function tambah()
    {
        $title     = 'Admin | Form Rincian Pengeluaran';
        $kolom_spp = KolomSpp::where('status_delete',0)->get();

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-tambah',compact('title','kolom_spp'));
    }
}
