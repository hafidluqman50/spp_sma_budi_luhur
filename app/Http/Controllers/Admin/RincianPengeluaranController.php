<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;
use App\Models\KolomSpp;
use App\Models\SppBayarDetail;
use App\Models\TahunAjaran;

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

        return view('Admin.rincian-pengeluaran.rincian-pengeluaran-tambah',compact('title','kolom_spp','tahun_ajaran'));
    }

    public function save(Request $request)
    {   
        $id_rincian_pengeluaran = (string)Str::uuid();
        $saldo_awal         = $request->saldo_awal;
        $tahun_ajaran       = $request->tahun_ajaran;
        $bulan_laporan      = $request->bulan_laporan;
        $tahun_laporan      = $request->tahun_laporan;
        $bulan_pengajuan    = $request->bulan_pengajuan;
        $tahun_pengajuan    = $request->tahun_pengajuan;
        $tanggal_perincian  = $request->tanggal_perincian;
        $uraian_rincian     = $request->uraian_rincian;
        $volume_rincian     = $request->volume_rincian;
        $nominal_rincian    = $request->nominal_rincian;
        $id_kolom_spp       = $request->id_kolom_spp;
        // $nominal_pendapatan = $request->nominal_pendapatan;
        $uraian_rab         = $request->uraian_rab;
        $volume_rab         = $request->volume_rab;
        $nominal_rab        = $request->nominal_rab;

        $data_rincian_pengeluaran = [
            'id_rincian_pengeluaran' => $id_rincian_pengeluaran,
            'saldo_awal'             => $saldo_awal,
            'id_tahun_ajaran'        => $tahun_ajaran,
            'bulan_laporan'          => $bulan_laporan,
            'tahun_laporan'          => $tahun_laporan,
            'bulan_pengajuan'        => $bulan_pengajuan,
            'tahun_pengajuan'        => $tahun_pengajuan
        ];

        RincianPengeluaran::create($data_rincian_pengeluaran);

        for ($i=0; $i < count($uraian_rincian); $i++) {
            $nominal_pendapatan = SppBayarDetail::whereMonth('tanggal_bayar',zero_front_number($bulan_laporan))
                                                ->whereYear('tanggal_bayar',$tahun_laporan)
                                                ->where('id_kolom_spp',$id_kolom_spp[$i])
                                                ->sum('nominal_bayar');

            $data_rincian_pengeluaran_detail = [
                'id_rincian_pengeluaran' => $id_rincian_pengeluaran,
                'tanggal_rincian'        => $tanggal_perincian[$i],
                'uraian_rincian'         => $uraian_rincian[$i],
                'volume_rincian'         => $volume_rincian[$i],
                'nominal_rincian'        => $nominal_rincian[$i],
                'id_kolom_spp'           => $id_kolom_spp[$i],
                'nominal_pendapatan_spp' => $nominal_pendapatan,
                'uraian_rab'             => $uraian_rab[$i],
                'volume_rab'             => $volume_rab[$i],
                'nominal_rab'            => $nominal_rab[$i]
            ];

            RincianPengeluaranDetail::create($data_rincian_pengeluaran_detail);   
        }

        return redirect('/admin/data-perincian-rab')->with('message','Berhasil Input RAB');
    }

    public function delete($id)
    {
        RincianPengeluaran::where('id_rincian_pengeluaran',$id)->delete();

        return redirect('/admin/data-perincian-rab')->with('message','Berhasil Hapus RAB');
    }
}
