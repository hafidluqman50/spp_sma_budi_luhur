<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kantin;
use App\Models\KolomSpp;

class KantinController extends Controller
{
    public function index()
    {
        $title = 'Kantin | Kepsek';

        return view('Kepsek.kantin.main',compact('title'));
    }
}
