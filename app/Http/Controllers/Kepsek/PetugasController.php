<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $title = 'Data Petugas | Admin';

        return view('Admin.petugas.main',compact('title'));
    }
}
