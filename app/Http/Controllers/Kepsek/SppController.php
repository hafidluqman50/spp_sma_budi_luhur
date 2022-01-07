<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $title = 'SPP | Kepsek';

        return view('Kepsek.spp.main',compact('title'));
    }
}
