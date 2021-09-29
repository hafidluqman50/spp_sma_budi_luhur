<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SppDetailController extends Controller
{
    public function index($id)
    {
        $title = 'SPP Detail | Admin';

        return view('Admin.spp-detail.main',compact('title','id'));
    }

    public function formBayarSemua($id)
    {
        $title = 'Form Bayar Semua | Admin';

        return view('Admin.spp-detail.spp-detail-bayar-semua',compact('title','id'));
    }

    public function formBayar($id,$id_detail)
    {
        $title = 'Form Bayar | Admin';

        return view('Admin.spp-detail.spp-detail-bayar',compact('title','id','id_detail'));
    }
}
