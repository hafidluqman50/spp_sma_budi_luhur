<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\SppBayar;
use App\Models\SppDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | Admin';
        $page  = 'dashboard';
        $transaksi_hari_ini = SppBayar::where('tanggal_bayar',date('Y-m-d'))
                                        ->sum('nominal_bayar');

        $transaksi_bulan_ini = SppBayar::whereMonth('tanggal_bayar',date('m'))
                                        ->sum('nominal_bayar');

        $total_uang_kantin = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','like','%kantin%')
                                        ->sum('bayar_spp');

        $total_tunggakan = SppDetail::where('status_bayar',0)->sum('sisa_bayar');

        if (session()->has('kwitansi_pembayaran_spp')) {
            session()->forget('kwitansi_pembayaran_spp');
        }

        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        $transaksi_terakhir = SppBayar::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                    // ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                    // ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                    ->orderBy('tanggal_bayar','DESC')
                                    ->limit(3)
                                    ->get();

        return view('Admin.dashboard',compact('title','page','transaksi_hari_ini','transaksi_bulan_ini','total_uang_kantin','total_tunggakan','kelas','tahun_ajaran','transaksi_terakhir'));
    }
}
