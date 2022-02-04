<?php

namespace App\Http\Controllers\Admin;

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

class DashboardController extends Controller
{
    public function index()
    {
        if (session()->has('bayar_spp')) {
            session()->forget('bayar_spp');
        }
        
        $title = 'Dashboard | Admin';
        $page  = 'dashboard';
        $transaksi_hari_ini = SppBayar::where('tanggal_bayar',date('Y-m-d'))
                                        ->sum('total_biaya');

        $transaksi_bulan_ini = SppBayar::whereMonth('tanggal_bayar',date('m'))
                                        ->sum('total_biaya');

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

        return view('Admin.dashboard',compact('title','page','transaksi_hari_ini','transaksi_bulan_ini','total_uang_kantin','total_tunggakan','kelas','tahun_ajaran','transaksi_terakhir','petugas','pendapatan_spp','pendapatan_spp_old','pendapatan_uang_makan','pendapatan_uang_makan_old','pendapatan_tab_tes','pendapatan_tab_tes_old','pendapatan_asrama','pendapatan_asrama_old'));
    }

    public function bayarSppDashboard()
    {
        if (session()->has('bayar_spp')) {
            $session_bayar_spp = session()->get('bayar_spp');
            $data_master       = $session_bayar_spp['data_master'];

            foreach ($session_bayar_spp['data_spp'] as $key => $value) {
                foreach ($value as $no => $data) {
                    $spp_detail = SppDetail::where('id_spp_detail',$data['id_spp_detail'])->firstOrFail();

                    if ($data['bayar_spp'] > $spp_detail->sisa_bayar) {
                        $status_bayar = 1;
                        $data['bayar_spp'] = $spp_detail->sisa_bayar;
                    }
                    else if ($data['bayar_spp'] == $spp_detail->sisa_bayar) {
                        $status_bayar = 1;
                    }
                    else {
                        $status_bayar = 0;
                    }

                    $data_spp_detail = [
                        'bayar_spp'    => $spp_detail->bayar_spp + $data['bayar_spp'],
                        'sisa_bayar'   => $spp_detail->sisa_bayar - $data['bayar_spp'],
                        'status_bayar' => $status_bayar
                    ];

                    $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                                                ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                                                ->firstOrFail()->id_spp;

                    $get_total_harus_bayar = Spp::where('id_spp',$get_id_spp)->firstOrFail()->total_harus_bayar;

                    $total_harus_bayar = $get_total_harus_bayar - $data['bayar_spp'];

                    SppDetail::where('id_spp_detail',$data['id_spp_detail'])
                            ->update($data_spp_detail);

                    Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);
                }
            }
            
            foreach ($session_bayar_spp['data_spp_rincian'] as $key => $value) {
                $data_spp_bayar = [
                    'id_spp_bayar'       => (string)Str::uuid(),
                    'id_spp_bulan_tahun' => $session_bayar_spp['data_spp_rincian'][$key]['id_spp_bulan_tahun'],
                    'tanggal_bayar'      => $session_bayar_spp['data_spp_rincian'][$key]['tanggal_spp'],
                    'total_biaya'        => $session_bayar_spp['data_spp_rincian'][$key]['total_bayar'],
                    'nominal_bayar'      => $session_bayar_spp['data_spp_rincian'][$key]['bayar_total'],
                    'kembalian'          => $session_bayar_spp['data_spp_rincian'][$key]['kembalian'],
                    'keterangan_bayar'   => $session_bayar_spp['data_spp_rincian'][$key]['keterangan'],
                    'id_users'           => Auth::user()->id_users
                ];
                SppBayar::create($data_spp_bayar);
                foreach ($value['bayar_detail'] as $index => $val) {
                    if ($val['nominal_bayar'] > 0) {
                        $data_spp_bayar_detail = [
                            'id_spp_bayar'  => $data_spp_bayar['id_spp_bayar'],
                            'id_kolom_spp'  => $val['id_kolom_spp'],
                            'tanggal_bayar' => $val['tanggal_bayar'],
                            'nominal_bayar' => $val['nominal_bayar'],
                        ];
                        SppBayarDetail::create($data_spp_bayar_detail);
                    }
                }   
            }

            $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();

            return view('Admin.struk',compact('data_master','petugas'));
        }
    }
}
