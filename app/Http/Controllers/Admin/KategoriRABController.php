<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriRABController extends Controller
{
    public function index()
    {
        $title = 'Kategori RAB | Admin';

        return view('Admin.kategori-rab.main',compact('title'));
    }
}
