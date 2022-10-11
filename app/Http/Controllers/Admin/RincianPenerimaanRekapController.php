<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPenerimaanRekapController extends Controller
{
    public function index($id,$id_rincian_penerimaan)
    {
        $title = 'Rincian Penerimaan Rekap';

        return view('Admin.rincian-penerimaan.rekap-rincian',compact('title','id','id_rincian_penerimaan'));
    }
}
