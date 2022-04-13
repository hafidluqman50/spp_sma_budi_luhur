<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;

class RincianPengeluaranController extends Controller
{
    public function index()
    {
        $title = 'Admin | Rincian Pengeluaran';

        return view('Admin.rincian-pengeluaran.main',compact('title'));
    }
}
