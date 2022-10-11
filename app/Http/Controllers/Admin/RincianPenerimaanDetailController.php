<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPenerimaanDetailController extends Controller
{
    public function index($id,$id_rincian_penerimaan)
    {
        $title = 'Rincian Penerimaan';

        return view('Admin.rincian-penerimaan.detail-rincian',compact('title','id','id_rincian_penerimaan'));
    }
}
