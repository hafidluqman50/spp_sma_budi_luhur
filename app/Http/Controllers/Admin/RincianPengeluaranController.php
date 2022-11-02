<?php

namespace App\Http\Controllers\Admin;

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
        $title = 'Admin | Rincian Pengeluaran';

        return view('Admin.rincian-pengeluaran.main',compact('title'));
    }

    public function tambah()
    {
        $title        = 'Admin | Form Rincian Pengeluaran';
        $kolom_spp    = KolomSpp::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $kantin       = Kantin::where('status_delete',0)->get();

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-tambah',compact('title','kolom_spp','tahun_ajaran','kantin'));
    }

    public function edit($id)
    {
        $title        = 'Admin | Form Rincian Pengeluaran';
        $kolom_spp    = KolomSpp::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();
        $row          = RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail();
        $row_detail   = RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)->get();

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-edit',compact('title','kolom_spp','tahun_ajaran','row','row_detail','id'));
    }

    public function save(Request $request)
    {   
        $id_rincian_pengeluaran   = (string)Str::uuid();
        $saldo_awal               = $request->saldo_awal;
        $tahun_ajaran             = $request->tahun_ajaran;
        $bulan_laporan            = $request->bulan_laporan;
        $tahun_laporan            = $request->tahun_laporan;
        $bulan_pengajuan          = $request->bulan_pengajuan;
        $tahun_pengajuan          = $request->tahun_pengajuan;
        $tanggal_perincian        = $request->tanggal_perincian;
        $uraian_rincian           = $request->uraian_rincian;
        $volume_rincian           = $request->volume_rincian;
        $ket_volume_rincian       = $request->ket_volume_rincian;
        $nominal_rincian          = $request->nominal_rincian;
        $id_kolom_spp             = $request->id_kolom_spp;
        // $nominal_pendapatan    = $request->nominal_pendapatan;
        $pemasukan_uang_makan     = $request->pemasukan_uang_makan;
        $pendapatan_input         = $request->pendapatan_input;
        $nominal_pendapatan_input = $request->nominal_pendapatan_input;
        $uraian_rab               = $request->uraian_rab;
        $volume_rab               = $request->volume_rab;
        $ket_volume_rab           = $request->ket_volume_rab;
        $nominal_rab              = $request->nominal_rab;

        $tanggal_perincian_uang_makan  = $request->tanggal_perincian_uang_makan;
        $kantin                        = $request->kantin;
        $uraian_rincian_uang_makan     = $request->uraian_rincian_uang_makan;
        $volume_rincian_uang_makan     = $request->volume_rincian_uang_makan;
        $ket_volume_rincian_uang_makan = $request->ket_volume_rincian_uang_makan;
        $nominal_rincian_uang_makan    = $request->nominal_rincian_uang_makan;

        $data_rincian_pengeluaran = [
            'id_rincian_pengeluaran' => $id_rincian_pengeluaran,
            'saldo_awal'             => $saldo_awal,
            'id_tahun_ajaran'        => $tahun_ajaran,
            'bulan_laporan'          => $bulan_laporan,
            'tahun_laporan'          => $tahun_laporan,
            'bulan_pengajuan'        => $bulan_pengajuan,
            'tahun_pengajuan'        => $tahun_pengajuan,
            'pemasukan_uang_makan'   => $pemasukan_uang_makan
        ];

        RincianPengeluaran::create($data_rincian_pengeluaran);
        for ($i=0; $i < count($uraian_rincian); $i++) {
            if ($nominal_pendapatan_input[$i] == '') {
                if ($id_kolom_spp[$i] == 'SPP') {
                    $nominal_pendapatan = SppBayarDetail::whereMonth('tanggal_bayar',zero_front_number($bulan_laporan))
                                                        ->whereYear('tanggal_bayar',$tahun_laporan)
                                                        ->sum('nominal_bayar');
                }
                else {
                    $nominal_pendapatan = SppBayarDetail::whereMonth('tanggal_bayar',zero_front_number($bulan_laporan))
                                                        ->whereYear('tanggal_bayar',$tahun_laporan)
                                                        ->where('id_kolom_spp',$id_kolom_spp[$i])
                                                        ->sum('nominal_bayar');
                }
            }
            else {
                $nominal_pendapatan = null;
            }

            $data_rincian_pengeluaran_sekolah = [
                'id_rincian_pengeluaran' => $id_rincian_pengeluaran,
                'tanggal_rincian'        => $tanggal_perincian[$i],
                'uraian_rincian'         => $uraian_rincian[$i],
                'volume_rincian'         => $volume_rincian[$i],
                'ket_volume_rincian'     => $ket_volume_rincian[$i],
                'nominal_rincian'        => $nominal_rincian[$i],
                'id_kolom_spp'           => $id_kolom_spp[$i],
                'nominal_pendapatan_spp' => $nominal_pendapatan,
                'kolom_pendapatan'       => $pendapatan_input[$i],
                'nominal_pendapatan'     => $nominal_pendapatan_input[$i],
                'uraian_rab'             => $uraian_rab[$i],
                'volume_rab'             => $volume_rab[$i],
                'ket_volume_rab'         => $ket_volume_rab[$i],
                'nominal_rab'            => $nominal_rab[$i]
            ];

            if ($id_kolom_spp[$i] == 'SPP') {
                $data_rincian_pengeluaran_sekolah['id_kolom_spp']           = null;
                $data_rincian_pengeluaran_sekolah['nominal_pendapatan_spp'] = null;
                $data_rincian_pengeluaran_sekolah['kolom_pendapatan']       = $id_kolom_spp[$i];
                $data_rincian_pengeluaran_sekolah['nominal_pendapatan']     = $nominal_pendapatan;
            }

            RincianPengeluaranSekolah::create($data_rincian_pengeluaran_sekolah);   
        }

        for ($j=0; $j < count($uraian_rincian_uang_makan); $j++) {

            $data_rincian_pengeluaran_uang_makan = [
                'id_rincian_pengeluaran' => $id_rincian_pengeluaran,
                'tanggal_rincian'        => $tanggal_perincian_uang_makan[$j],
                'uraian_rincian'         => $uraian_rincian_uang_makan[$j],
                'volume_rincian'         => $volume_rincian_uang_makan[$j],
                'ket_volume_rincian'     => $ket_volume_rincian_uang_makan[$j],
                'nominal_rincian'        => $nominal_rincian_uang_makan[$j],
                'id_kantin'              => $kantin[$j],
            ];

            RincianPengeluaranUangMakan::create($data_rincian_pengeluaran_uang_makan);  
        }

        return redirect('/admin/data-perincian-rab')->with('message','Berhasil Input RAB');
    }

    public function update(Request $request,$id)
    {
        $saldo_awal                    = $request->saldo_awal;
        $tahun_ajaran                  = $request->tahun_ajaran;
        $bulan_laporan                 = $request->bulan_laporan;
        $tahun_laporan                 = $request->tahun_laporan;
        $bulan_pengajuan               = $request->bulan_pengajuan;
        $tahun_pengajuan               = $request->tahun_pengajuan;
        $tanggal_perincian             = $request->tanggal_perincian;
        $uraian_rincian                = $request->uraian_rincian;
        $volume_rincian                = $request->volume_rincian;
        $ket_volume_rincian            = $request->ket_volume_rincian;
        $nominal_rincian               = $request->nominal_rincian;
        $id_kolom_spp                  = $request->id_kolom_spp;
        // $nominal_pendapatan         = $request->nominal_pendapatan;
        $pendapatan_input              = $request->pendapatan_input;
        $nominal_pendapatan_input      = $request->nominal_pendapatan_input;
        $uraian_rab                    = $request->uraian_rab;
        $volume_rab                    = $request->volume_rab;
        $ket_volume_rab                = $request->ket_volume_rab;
        $nominal_rab                   = $request->nominal_rab;
        $id_rincian_pengeluaran_detail = $request->id_rincian_pengeluaran_detail;

        $data_rincian_pengeluaran = [
            'saldo_awal'             => $saldo_awal,
            'id_tahun_ajaran'        => $tahun_ajaran,
            'bulan_laporan'          => $bulan_laporan,
            'tahun_laporan'          => $tahun_laporan,
            'bulan_pengajuan'        => $bulan_pengajuan,
            'tahun_pengajuan'        => $tahun_pengajuan
        ];

        // dd($nominal_pendapatan_input);
        RincianPengeluaran::where('id_rincian_pengeluaran',$id)->update($data_rincian_pengeluaran);

        for ($i=0; $i < count($uraian_rincian); $i++) {
            if ($id_kolom_spp != '') {
                $nominal_pendapatan = SppBayarDetail::whereMonth('tanggal_bayar',zero_front_number($bulan_laporan))
                                                    ->whereYear('tanggal_bayar',$tahun_laporan)
                                                    ->where('id_kolom_spp',$id_kolom_spp[$i])
                                                    ->sum('nominal_bayar');
            }
            else {
                $nominal_pendapatan = null;
            }

            if ($id_rincian_pengeluaran_detail[$i] != '') {
                $data_rincian_pengeluaran_detail = [
                    'tanggal_rincian'        => $tanggal_perincian[$i],
                    'uraian_rincian'         => $uraian_rincian[$i],
                    'volume_rincian'         => $volume_rincian[$i],
                    'ket_volume_rincian'     => $ket_volume_rincian[$i],
                    'nominal_rincian'        => $nominal_rincian[$i],
                    'id_kolom_spp'           => $id_kolom_spp[$i],
                    'nominal_pendapatan_spp' => $nominal_pendapatan,
                    'kolom_pendapatan'       => $pendapatan_input[$i],
                    'nominal_pendapatan'     => $nominal_pendapatan_input[$i],
                    'uraian_rab'             => $uraian_rab[$i],
                    'volume_rab'             => $volume_rab[$i],
                    'ket_volume_rab'         => $ket_volume_rab[$i],
                    'nominal_rab'            => $nominal_rab[$i]
                ];

                RincianPengeluaranDetail::where('id_rincian_pengeluaran_detail',$id_rincian_pengeluaran_detail[$i])->update($data_rincian_pengeluaran_detail);
            }
            else {
                $data_rincian_pengeluaran_detail = [
                    'id_rincian_pengeluaran' => $id,
                    'tanggal_rincian'        => $tanggal_perincian[$i],
                    'uraian_rincian'         => $uraian_rincian[$i],
                    'volume_rincian'         => $volume_rincian[$i],
                    'nominal_rincian'        => $nominal_rincian[$i],
                    'id_kolom_spp'           => $id_kolom_spp[$i],
                    'nominal_pendapatan_spp' => $nominal_pendapatan,
                    'kolom_pendapatan'       => $pendapatan_input[$i],
                    'nominal_pendapatan'     => $nominal_pendapatan_input[$i],
                    'uraian_rab'             => $uraian_rab[$i],
                    'volume_rab'             => $volume_rab[$i],
                    'nominal_rab'            => $nominal_rab[$i]
                ];

                RincianPengeluaranDetail::create($data_rincian_pengeluaran_detail);
            }
        }

        return redirect('/admin/data-perincian-rab')->with('message','Berhasil Update RAB');
    }

    public function delete($id)
    {
        RincianPengeluaran::where('id_rincian_pengeluaran',$id)->delete();

        return redirect('/admin/data-perincian-rab')->with('message','Berhasil Hapus RAB');
    }

    public function lihatRincianPengeluaranSekolah($id)
    {
        $title = 'Rincian Pengeluaran Sekolah';

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-sekolah',compact('title','id'));
    }

    public function lihatRincianPengeluaranUangMakan($id)
    {
        $title = 'Rincian Pengeluaran Uang Makan';

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-uang-makan',compact('title','id'));
    }

    public function deleteRincianPengeluaranSekolah($id,$id_detail)
    {
        RincianPengeluaranSekolah::where('id_rincian_pengeluaran',$id)
                                ->where('id_rincian_pengeluaran_sekolah',$id_detail)
                                ->delete();

        return redirect('/admin/data-perincian-rab/rincian-pengeluaran-sekolah/'.$id)->with('message','Berhasil Hapus Data');
    }

    public function deleteRincianPengeluaranUangMakan($id,$id_detail)
    {
        RincianPengeluaranUangMakan::where('id_rincian_pengeluaran',$id)
                                ->where('id_rincian_pengeluaran_sekolah',$id_detail)
                                ->delete();

        return redirect('/admin/data-perincian-rab/rincian-pengeluaran-uang-makan/'.$id)->with('message','Berhasil Hapus Data');
    }
}
