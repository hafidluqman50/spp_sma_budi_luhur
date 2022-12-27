<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranSekolah;
use App\Models\RincianPengeluaranUangMakan;
use App\Models\KolomSpp;
use App\Models\SppBayarDetail;
use App\Models\TahunAjaran;
use App\Models\Kantin;

class RincianPengeluaranController extends Controller
{
    public function index()
    {
        $title = 'Kepsek | Rincian Pengeluaran';
        return view('Kepsek.rincian-pengeluaran.main',compact('title'));
    }

    public function lihatRincianPengeluaranSekolah($id)
    {
        $title = 'Rincian Pengeluaran Sekolah';

        return view('Kepsek.rincian-pengeluaran.rincian-pengeluaran-sekolah',compact('title','id'));
    }

    public function lihatRincianPengeluaranUangMakan($id)
    {
        $title = 'Rincian Pengeluaran Uang Makan';

        return view('Kepsek.rincian-pengeluaran.rincian-pengeluaran-uang-makan',compact('title','id'));
    }
}
