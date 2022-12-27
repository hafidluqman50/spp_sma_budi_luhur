<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaranSekolah;
use App\Models\RincianPengeluaranUangMakan;
use App\Models\RincianPembelanjaan;
use App\Models\RincianPembelanjaanTahunAjaran;
use App\Models\RincianPengeluaran;

class RincianPembelanjaanController extends Controller
{
    public function rincianPembelanjaan($id)
    {
        $title = 'Rincian Pembelanjaan | Kepsek';

        return view('Kepsek.rincian-pembelanjaan.main',compact('title','id'));
    }

    public function rincianPembelanjaanUangMakan($id)
    {
        $title = 'Rincian Pembelanjaan Uang Makan | Kepsek';

        return view('Kepsek.rincian-pembelanjaan.main-uang-makan',compact('title','id'));
    }
}
