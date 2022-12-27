<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $title = 'TahunAjaran | Kepsek';

        return view('Kepsek.tahun-ajaran.main',compact('title'));
    }
}
