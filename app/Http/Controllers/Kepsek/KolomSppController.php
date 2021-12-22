<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KolomSpp;
use Illuminate\Support\Str;

class KolomSppController extends Controller
{
    public function index()
    {
        $title = 'Kolom SPP | Admin';

        return view('Admin.kolom-spp.main',compact('title'));
    }
}
