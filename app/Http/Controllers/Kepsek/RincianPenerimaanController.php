<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPenerimaan;
use App\Models\RincianPenerimaanRekap;
use App\Models\RincianPenerimaanDetail;
use App\Models\RincianPenerimaanTahunAjaran;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranSekolah;
use App\Models\KolomSpp;
use Illuminate\Support\Str;
use App\Models\SppBayarData;
use App\Models\SppBayar;
use App\Models\SppDetail;

class RincianPenerimaanController extends Controller
{
    public function index($id)
    {
        $title        = 'Rincian Penerimaan';
        $tahun_ajaran = RincianPengeluaran::join('tahun_ajaran','rincian_pengeluaran.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')->where('id_rincian_pengeluaran',$id)->firstOrFail()->tahun_ajaran;

        $bulan_laporan = month(RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail()->bulan_laporan);

        $check = RincianPenerimaan::where('id_rincian_pengeluaran',$id)->count();

        return view('Kepsek.rincian-penerimaan.main',compact('title','id','tahun_ajaran','bulan_laporan','check'));
    }
}
