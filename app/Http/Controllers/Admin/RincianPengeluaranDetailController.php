<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPengeluaranDetailController extends Controller
{
    public function index($id)
    {
        $title = 'Admin | Rincian Pengeluaran Detail';

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-detail',compact('title','id'));
    }
}
