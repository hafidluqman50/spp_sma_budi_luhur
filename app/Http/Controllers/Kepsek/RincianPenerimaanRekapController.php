<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPenerimaanRekapController extends Controller
{
    public function index($id,$id_rincian_penerimaan)
    {
        $title = 'Rincian Penerimaan Rekap';

        return view('Kepsek.rincian-penerimaan.rekap-rincian',compact('title','id','id_rincian_penerimaan'));
    }
}
