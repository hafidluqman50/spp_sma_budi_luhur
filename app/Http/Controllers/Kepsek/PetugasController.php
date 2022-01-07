<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $title = 'Data Petugas | Kepsek';

        return view('Kepsek.petugas.main',compact('title'));
    }
}
