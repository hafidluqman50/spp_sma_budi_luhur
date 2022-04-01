<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangRABController extends Controller
{
    public function index()
    {
        $title = 'Barang RAB | Admin';

        return view('Admin.barang-rab.main',compact('title'));
    }
}
