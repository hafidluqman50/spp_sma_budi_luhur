<?php

namespace App\Http\Controllers\Petugas;

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
use App\Models\SppBayarData;
use App\Models\ProfileInstansi;
use App\Models\User;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (session()->has('bayar_spp')) {
            session()->forget('bayar_spp');
        }
        
        $title = 'Dashboard | Petugas';
        $page  = 'dashboard';
        $transaksi_hari_ini = SppBayarDetail::where('tanggal_bayar',date('Y-m-d'))
                                        ->sum('nominal_bayar');

        $transaksi_bulan_ini = SppBayarDetail::whereMonth('tanggal_bayar',date('m'))
                                        ->sum('nominal_bayar');

        $total_uang_kantin = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                        ->where('slug_kolom_spp','like','%uang-makan%')
                                        ->sum('sisa_bayar');

        $total_tunggakan = SppDetail::join('kolom_spp','spp_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')
                                    ->where('status_bayar',0)
                                    ->whereNotIn('slug_kolom_spp',['uang-makan'])
                                    ->sum('sisa_bayar');

        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        $transaksi_terakhir = SppBayarData::join('spp','spp_bayar_data.id_spp','=','spp.id_spp')
                                        ->join('kelas_siswa','spp.id_kelas_siswa','=','kelas_siswa.id_kelas_siswa')
                                        // ->join('kelas','kelas_siswa.id_kelas','=','kelas.id_kelas')
                                        ->join('siswa','kelas_siswa.id_siswa','=','siswa.id_siswa')
                                        ->orderBy('tanggal_bayar','DESC')
                                        ->get();

        // $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();
        $bendahara = ProfileInstansi::firstOrFail()->nama_bendahara;

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

        $tahun_pendapatan = SppBayarData::select(DB::raw('DISTINCT YEAR(tanggal_bayar) as tahun_pendapatan'))->orderBy('tahun_pendapatan','ASC')->get();
        $grafik_pendapatan[] = [];

        foreach ($tahun_pendapatan as $key => $value) {
            $pendapatan_komplek    = SppBayarData::getTotalPendapatan($value->tahun_pendapatan,'komplek');
            $pendapatan_dalam_kota = SppBayarData::getTotalPendapatan($value->tahun_pendapatan,'dalam-kota');
            $pendapatan_luar_kota  = SppBayarData::getTotalPendapatan($value->tahun_pendapatan,'luar-kota');

            $grafik_pendapatan[$key] = [
                'y' => (string)$value->tahun_pendapatan,
                'a' => $pendapatan_komplek,
                'b' => $pendapatan_dalam_kota,
                'c' => $pendapatan_luar_kota
            ];
        }

        return view('Petugas.dashboard',compact('title','page','transaksi_hari_ini','transaksi_bulan_ini','total_uang_kantin','total_tunggakan','kelas','tahun_ajaran','transaksi_terakhir','bendahara','pendapatan_spp','pendapatan_spp_old','pendapatan_uang_makan','pendapatan_uang_makan_old','pendapatan_tab_tes','pendapatan_tab_tes_old','pendapatan_asrama','pendapatan_asrama_old','grafik_tunggakan','grafik_pendapatan'));
    }

    // public function bayarSppDashboard()
    // {
    //     if (session()->has('bayar_spp')) {
    //         $session_bayar_spp = session()->get('bayar_spp');
    //         $data_master       = $session_bayar_spp['data_master'];

    //         foreach ($session_bayar_spp['data_spp'] as $key => $value) {
    //             foreach ($value as $no => $data) {
    //                 $spp_detail = SppDetail::where('id_spp_detail',$data['id_spp_detail'])->firstOrFail();

    //                 if ($data['bayar_spp'] > $spp_detail->sisa_bayar) {
    //                     $status_bayar = 1;
    //                     $data['bayar_spp'] = $spp_detail->sisa_bayar;
    //                 }
    //                 else if ($data['bayar_spp'] == $spp_detail->sisa_bayar) {
    //                     $status_bayar = 1;
    //                 }
    //                 else {
    //                     $status_bayar = 0;
    //                 }

    //                 $data_spp_detail = [
    //                     'bayar_spp'    => $spp_detail->bayar_spp + $data['bayar_spp'],
    //                     'sisa_bayar'   => $spp_detail->sisa_bayar - $data['bayar_spp'],
    //                     'status_bayar' => $status_bayar
    //                 ];

    //                 $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
    //                                             ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
    //                                             ->firstOrFail()->id_spp;

    //                 $get_total_harus_bayar = Spp::where('id_spp',$get_id_spp)->firstOrFail()->total_harus_bayar;

    //                 $total_harus_bayar = $get_total_harus_bayar - $data['bayar_spp'];

    //                 SppDetail::where('id_spp_detail',$data['id_spp_detail'])
    //                         ->update($data_spp_detail);

    //                 Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);
    //             }
    //         }
            
    //         foreach ($session_bayar_spp['data_spp_rincian'] as $key => $value) {
    //             $data_spp_bayar = [
    //                 'id_spp_bayar'       => (string)Str::uuid(),
    //                 'id_spp_bulan_tahun' => $session_bayar_spp['data_spp_rincian'][$key]['id_spp_bulan_tahun'],
    //                 'tanggal_bayar'      => $session_bayar_spp['data_spp_rincian'][$key]['tanggal_spp'],
    //                 'total_biaya'        => $session_bayar_spp['data_spp_rincian'][$key]['total_bayar'],
    //                 'nominal_bayar'      => $session_bayar_spp['data_spp_rincian'][$key]['bayar_total'],
    //                 'kembalian'          => $session_bayar_spp['data_spp_rincian'][$key]['kembalian'],
    //                 'keterangan_bayar'   => $session_bayar_spp['data_spp_rincian'][$key]['keterangan'],
    //                 'id_users'           => Auth::user()->id_users
    //             ];
    //             SppBayar::create($data_spp_bayar);
    //             foreach ($value['bayar_detail'] as $index => $val) {
    //                 if ($val['nominal_bayar'] > 0) {
    //                     $data_spp_bayar_detail = [
    //                         'id_spp_bayar'  => $data_spp_bayar['id_spp_bayar'],
    //                         'id_kolom_spp'  => $val['id_kolom_spp'],
    //                         'tanggal_bayar' => $val['tanggal_bayar'],
    //                         'nominal_bayar' => $val['nominal_bayar'],
    //                     ];
    //                     SppBayarDetail::create($data_spp_bayar_detail);
    //                 }
    //             }   
    //         }

    //         $petugas = Petugas::where('jabatan_petugas','bendahara-internal')->firstOrFail();

    //         return view('Petugas.struk',compact('data_master','petugas'));
    //     }
    // }

    public function bayarTunggakan(Request $request)
    {
        $total_biaya    = $request->total_biaya;
        $bayar_total    = $request->bayar_total;
        $kembalian      = $request->kembalian;
        $keterangan_spp = $request->keterangan_spp;
        $jenis_bayar    = $request->jenis_bayar;
        $id_spp         = $request->id_spp;
        // dd($id_spp);

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

                    // $get_id_spp = SppBulanTahun::join('spp','spp_bulan_tahun.id_spp','=','spp.id_spp')
                    //                             ->where('id_spp_bulan_tahun',$spp_detail->id_spp_bulan_tahun)
                    //                             ->firstOrFail()->id_spp;

                    // $get_total_harus_bayar = Spp::where('id_spp',$get_id_spp)->firstOrFail()->total_harus_bayar;

                    // $total_harus_bayar = $get_total_harus_bayar - $data['bayar_spp'];

                    SppDetail::where('id_spp_detail',$data['id_spp_detail'])
                            ->update($data_spp_detail);

                    // Spp::where('id_spp',$get_id_spp)->update(['total_harus_bayar' => $total_harus_bayar]);
                }
            }
            
            $data_spp_bayar_data = [
                'id_spp'               => $id_spp,
                'id_spp_bayar_data'    => (string)Str::uuid(),
                'tanggal_bayar'        => $data_master['tanggal_spp'],
                'total_biaya'          => $total_biaya,
                'nominal_bayar'        => $bayar_total,
                'kembalian'            => $kembalian,
                'keterangan_bayar_spp' => $keterangan_spp,
                'jenis_bayar'          => $jenis_bayar,
                'id_users'             => auth()->user()->id_users
            ];
            SppBayarData::create($data_spp_bayar_data);

            foreach ($session_bayar_spp['data_spp_rincian'] as $key => $value) {
                $data_spp_bayar = [
                    'id_spp_bayar_data'  => $data_spp_bayar_data['id_spp_bayar_data'],
                    'id_spp_bayar'       => (string)Str::uuid(),
                    'id_spp_bulan_tahun' => $session_bayar_spp['data_spp_rincian'][$key]['id_spp_bulan_tahun'],
                    // 'total_biaya'        => $session_bayar_spp['data_spp_rincian'][$key]['total_bayar'],
                    // 'nominal_bayar'      => $session_bayar_spp['data_spp_rincian'][$key]['bayar_total'],
                    // 'kembalian'          => $session_bayar_spp['data_spp_rincian'][$key]['kembalian'],
                    // 'keterangan_bayar'   => $session_bayar_spp['data_spp_rincian'][$key]['keterangan'],
                    // 'id_users'           => Auth::user()->id_users
                ];
                SppBayar::create($data_spp_bayar);

                foreach ($value['bayar_detail'] as $index => $val) {
                    if ($val['nominal_bayar'] > 0) {
                        $data_spp_bayar_detail = [
                            'id_spp_bayar'  => $data_spp_bayar['id_spp_bayar'],
                            'id_kolom_spp'  => $val['id_kolom_spp'],
                            'tanggal_bayar' => $data_master['tanggal_spp'],
                            'nominal_bayar' => $val['nominal_bayar'],
                        ];
                        SppBayarDetail::create($data_spp_bayar_detail);
                        $get_kolom_spp = KolomSpp::where('id_kolom_spp',$val['id_kolom_spp'])->firstOrFail();
                        if ($get_kolom_spp->slug_kolom_spp == 'uang-makan') {
                            $get_kantin = SppBulanTahun::where('id_spp_bulan_tahun',$data_spp_bayar['id_spp_bulan_tahun'])
                                                        ->firstOrFail()->id_kantin;

                            $check_pemasukan_kantin = PemasukanKantin::where('id_spp_bulan_tahun',$data_spp_bayar['id_spp_bulan_tahun'])
                                                                      ->where('id_kantin',$get_kantin->id_kantin)
                                                                      ->count();
                            if ($check_pemasukan_kantin > 0) {
                                $nominal_lama = PemasukanKantin::where('id_spp_bulan_tahun',$data_spp_bayar['id_spp_bulan_tahun'])
                                                            ->where('id_kantin',$get_kantin->id_kantin)
                                                            ->firstOrFail()->nominal_pemasukan;

                                $nominal_kalkulasi = $nominal_lama + $val['nominal_bayar'];
                                $nominal = PemasukanKantin::where('id_spp_bulan_tahun',$data_spp_bayar['id_spp_bulan_tahun'])
                                                            ->where('id_kantin',$get_kantin->id_kantin)
                                                            ->update(['nominal_pemasukan' => $nominal_kalkulasi]);
                            }
                            else {
                                $data_pemasukan_kantin = [
                                    'id_spp_bulan_tahun' => $data_spp_bayar['id_spp_bulan_tahun'],
                                    'id_kantin'          => $get_kantin->id_kantin,
                                    'nominal_pemasukan'  => $val['nominal_bayar']
                                ];

                                $nominal = PemasukanKantin::create($data_pemasukan_kantin);
                            }
                        }
                    }
                }   
            }

            $profile_instansi = ProfileInstansi::firstOrFail();

            return view('Petugas.struk',compact('data_master','profile_instansi'));
        }
    }

    public function settings()
    {
        $title = 'Settings';
        $profile_instansi = ProfileInstansi::firstOrFail();
        return view('Petugas.settings',compact('title','profile_instansi'));
    }

    public function saveSettings(Request $request)
    {
        $nama                   = $request->nama;
        $username               = $request->username;
        $password               = $request->password;
        $nama_kepsek            = $request->nama_kepsek;
        $nama_pengurus_yayasan  = $request->nama_pengurus_yayasan;
        $nama_pembina_yayasan   = $request->nama_pembina_yayasan;
        $nama_bendahara         = $request->nama_bendahara;
        $nama_bendahara_yayasan = $request->nama_bendahara_yayasan;
        $nama_wali_pembina      = $request->nama_wali_pembina;

        if (User::where('username',$username)->count()>0) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'name'          => $nama,
            'username'      => $username,
            'password'      => bcrypt($password)
        ];

        $data_profile_instansi = [
            'nama_kepsek'            => $nama_kepsek,
            'nama_pengurus_yayasan'  => $nama_pengurus_yayasan,
            'nama_pembina_yayasan'   => $nama_pembina_yayasan,
            'nama_bendahara'         => $nama_bendahara,
            'nama_bendahara_yayasan' => $nama_bendahara_yayasan,
            'nama_wali_pembina'      => $nama_wali_pembina
        ];

        if ($username == '' && $password == '') {
            unset($data_user['username']);
            unset($data_user['password']);
        }
        elseif($username == '') {
            unset($data_user['username']);
        }
        elseif ($password == '') {
            unset($data_user['password']);
        }

        $id_profile_instansi = ProfileInstansi::firstOrFail()->id_profile_instansi;

        User::where('id_users',auth()->user()->id_users)->update($data_user);
        ProfileInstansi::where('id_profile_instansi',$id_profile_instansi)->update($data_profile_instansi);
        // ProfileInstansi::create($data_profile_instansi);

        return redirect('/petugas/settings')->with('message','Berhasil Update');
    }
}
