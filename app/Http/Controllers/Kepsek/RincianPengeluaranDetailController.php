<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPengeluaranDetailController extends Controller
{
    public function index($id)
    {
        $title = 'Kepsek | Rincian Pengeluaran Detail';

        return view('Kepsek.rincian-pengeluaran.rincian-pengeluaran-detail',compact('title','id'));
    }
}
