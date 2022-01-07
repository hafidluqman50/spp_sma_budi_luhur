<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KolomSpp;
use Illuminate\Support\Str;

class KolomSppController extends Controller
{
    public function index()
    {
        $title = 'Kolom SPP | Kepsek';

        return view('Kepsek.kolom-spp.main',compact('title'));
    }
}
