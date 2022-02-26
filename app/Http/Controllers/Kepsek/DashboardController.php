<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Spp;
use App\Models\SppBayar;
use App\Models\SppDetail;
use App\Models\SppBulanTahun;
use App\Models\Petugas;
use App\Models\SppBayarDetail;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (session()->has('bayar_spp')) {
            session()->forget('bayar_spp');
        }
        
        $title = 'Dashboard | Kepsek';
        $page  = 'dashboard';
        $transaksi_hari_ini = SppBayarDetail::where('tanggal_bayar',date('Y-m-d'))
                                        ->sum('nominal_bayar');

        $transaksi_bulan_ini = SppBayarDetail::whereMonth('tanggal_bayar',date('m'))
                                        ->sum('nominal_bayar');

        $total_uang_kantin = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','like','%uang-makan%')
                                        ->sum('sisa_bayar');

        $total_tunggakan = SppDetail::where('status_bayar',0)->sum('sisa_bayar');

        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        $transaksi_terakhir = SppBayar::join('spp_bulan_tahun','spp_bayar.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                    ->join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                    ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                    // ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                    ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                    // ->join('tahun_ajaran','kelas_siswa.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')
                                    ->orderBy('tanggal_bayar','DESC')
                                    ->get();

        $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();

        $get_backwards_date = backwards_date('-1 month',date('Y-m-d'));

        $explode_date       = explode('-',$get_backwards_date);

        $pendapatan_spp = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','spp')
                                        ->whereMonth('tanggal_bayar',date('m'))
                                        ->whereYear('tanggal_bayar',date('Y'))
                                        ->sum('nominal_bayar');

        $pendapatan_spp_old = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','spp')
                                        ->whereMonth('tanggal_bayar',$explode_date[1])
                                        ->whereYear('tanggal_bayar',$explode_date[0])
                                        ->sum('nominal_bayar');

        $pendapatan_uang_makan = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','uang-makan')
                                        ->whereMonth('tanggal_bayar',date('m'))
                                        ->whereYear('tanggal_bayar',date('Y'))
                                        ->sum('nominal_bayar');

        $pendapatan_uang_makan_old = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','uang-makan')
                                        ->whereMonth('tanggal_bayar',$explode_date[1])
                                        ->whereYear('tanggal_bayar',$explode_date[0])
                                        ->sum('nominal_bayar');

        $pendapatan_tab_tes = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','tab-tes')
                                        ->whereMonth('tanggal_bayar',date('m'))
                                        ->whereYear('tanggal_bayar',date('Y'))
                                        ->sum('nominal_bayar');

        $pendapatan_tab_tes_old = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','tab-tes')
                                        ->whereMonth('tanggal_bayar',$explode_date[1])
                                        ->whereYear('tanggal_bayar',$explode_date[0])
                                        ->sum('nominal_bayar');

        $pendapatan_asrama = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','asrama')
                                        ->whereMonth('tanggal_bayar',date('m'))
                                        ->whereYear('tanggal_bayar',date('Y'))
                                        ->sum('nominal_bayar');

        $pendapatan_asrama_old = SppBayarDetail::join('kolom_spp','spp_bayar_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','asrama')
                                        ->whereMonth('tanggal_bayar',$explode_date[1])
                                        ->whereYear('tanggal_bayar',$explode_date[0])
                                        ->sum('nominal_bayar');

        $tahun_tunggakan = SppBulanTahun::select(DB::raw('DISTINCT RIGHT(bulan_tahun,4) as tahun_tunggakan'))->orderBy('tahun_tunggakan','ASC')->get();
        $grafik_tunggakan[] = [];

        foreach ($tahun_tunggakan as $key => $value) {
            $tunggakan_komplek    = SppDetail::getTotalTunggakan($value->tahun_tunggakan,'komplek');
            $tunggakan_dalam_kota = SppDetail::getTotalTunggakan($value->tahun_tunggakan,'dalam-kota');
            $tunggakan_luar_kota  = SppDetail::getTotalTunggakan($value->tahun_tunggakan,'luar-kota');

            $grafik_tunggakan[$key] = [
                'y' => $value->tahun_tunggakan,
                'a' => $tunggakan_komplek,
                'b' => $tunggakan_dalam_kota,
                'c' => $tunggakan_luar_kota
            ];
        }

        $tahun_pendapatan = SppBayar::select(DB::raw('DISTINCT YEAR(tanggal_bayar) as tahun_pendapatan'))->orderBy('tahun_pendapatan','ASC')->get();
        $grafik_pendapatan[] = [];

        foreach ($tahun_pendapatan as $key => $value) {
            $pendapatan_komplek    = SppBayar::getTotalPendapatan($value->tahun_pendapatan,'komplek');
            $pendapatan_dalam_kota = SppBayar::getTotalPendapatan($value->tahun_pendapatan,'dalam-kota');
            $pendapatan_luar_kota  = SppBayar::getTotalPendapatan($value->tahun_pendapatan,'luar-kota');

            $grafik_pendapatan[$key] = [
                'y' => (string)$value->tahun_pendapatan,
                'a' => $pendapatan_komplek,
                'b' => $pendapatan_dalam_kota,
                'c' => $pendapatan_luar_kota
            ];
        }

        return view('Kepsek.dashboard',compact('title','page','transaksi_hari_ini','transaksi_bulan_ini','total_uang_kantin','total_tunggakan','kelas','tahun_ajaran','transaksi_terakhir','petugas','pendapatan_spp','pendapatan_spp_old','pendapatan_uang_makan','pendapatan_uang_makan_old','pendapatan_tab_tes','pendapatan_tab_tes_old','pendapatan_asrama','pendapatan_asrama_old','grafik_tunggakan','grafik_pendapatan'));
    }
}
