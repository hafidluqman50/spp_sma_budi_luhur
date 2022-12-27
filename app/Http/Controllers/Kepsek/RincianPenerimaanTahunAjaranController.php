<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPenerimaanTahunAjaranController extends Controller
{
    public function index($id,$id_rincian_penerimaan)
    {
        $title = 'Rincian Penerimaan Tahun Ajaran';

        return view('Kepsek.rincian-penerimaan.rincian-tahun-ajaran',compact('title','id','id_rincian_penerimaan'));
    }
}
