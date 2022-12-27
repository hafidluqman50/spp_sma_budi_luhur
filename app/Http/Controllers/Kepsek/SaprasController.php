<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sapras;

class SaprasController extends Controller
{
    public function index($id)
    {
        $title = 'Kepsek | Rincian Pengajuan';

        return view('Kepsek.sapras.main',compact('title','id'));
    }
}
