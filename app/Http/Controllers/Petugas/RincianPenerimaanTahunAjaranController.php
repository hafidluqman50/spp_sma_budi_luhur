<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RincianPenerimaanTahunAjaranController extends Controller
{
    public function index($id,$id_rincian_penerimaan)
    {
        $title = 'Rincian Penerimaan Tahun Ajaran';

        return view('Petugas.rincian-penerimaan.rincian-tahun-ajaran',compact('title','id','id_rincian_penerimaan'));
    }
}
