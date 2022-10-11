<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPenerimaan;
use App\Models\RincianPenerimaanRekap;
use App\Models\RincianPenerimaanDetail;
use App\Models\RincianPenerimaanTahunAjaran;
use App\Models\RincianPengeluaran;
use App\Models\RincianPengeluaranDetail;
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

        return view('Admin.rincian-penerimaan.main',compact('title','id','tahun_ajaran','bulan_laporan','check'));
    }

    public function tambah($id)
    {
        $title        = 'Tambah Rincian Penerimaan';
        $pendapatan   = RincianPengeluaranDetail::leftJoin('kolom_spp','rincian_pengeluaran_detail.id_kolom_spp','=','kolom_spp.id_kolom_spp')->where('id_rincian_pengeluaran',$id)->get();
        $tahun_ajaran = RincianPengeluaran::join('tahun_ajaran','rincian_pengeluaran.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')->where('id_rincian_pengeluaran',$id)->firstOrFail()->tahun_ajaran;

        $bulan_laporan = month(RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail()->bulan_laporan);
        $bulan = [0 => [7,8,9,10,11,12], 1 => [1,2,3,4,5,6]];

        $bon_pengajuan = RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail()->saldo_awal;

        $realisasi_pengeluaran = RincianPengeluaranDetail::selectRaw("*, SUM(volume_rincian * nominal_rincian) as sum_sub_total")->where('id_rincian_pengeluaran',$id)->get()[0]->sum_sub_total;
        // $

        return view('Admin.rincian-penerimaan.rincian-penerimaan-tambah',compact('title','id','pendapatan','tahun_ajaran','bulan_laporan','bulan','bon_pengajuan','realisasi_pengeluaran'));
    }

    public function save(Request $request,$id)
    {
        $bulan_laporan                 = describe_month($request->bulan_laporan);
        $tahun_ajaran                  = $request->tahun_ajaran;
        $tahun_laporan                 = tahun_laporan($bulan_laporan,$tahun_ajaran);
        $pendapatan                    = $request->pendapatan;
        $rencana                       = $request->rencana;
        $penerimaan                    = $request->penerimaan;
        $keterangan_penerimaan         = $request->keterangan_penerimaan;

        $bulan_rincian                 = $request->bulan_rincian;
        $tahun_rincian                 = $request->tahun_rincian;
        $pemasukan                     = $request->pemasukan;
        $realisasi_pengeluaran_bulan   = $request->realisasi_pengeluaran_bulan;
        $sisa_akhir_bulan              = $request->sisa_akhir_bulan;

        $tanggal_bon_pengajuan         = $request->tanggal_bon_pengajuan;
        $nominal_bon_pengajuan         = $request->bon_pengajuan;
        $tanggal_realisasi_pengeluaran = $request->tanggal_realisasi_pengeluaran;
        $realisasi_pengeluaran         = $request->realisasi_pengeluaran;
        $tanggal_penerimaan_bulan_ini  = $request->tanggal_penerimaan_bulan_ini;
        $nominal_penerimaan_bulan_ini  = $request->penerimaan_bulan_ini;

        $id_rincian_penerimaan = (string)Str::uuid();

        $data_rincian_penerimaan = [
            'id_rincian_penerimaan'  => $id_rincian_penerimaan,
            'id_rincian_pengeluaran' => $id
        ];
        RincianPenerimaan::create($data_rincian_penerimaan);

        $get_total_tunggakan = SppDetail::join('spp_bulan_tahun','spp_detail.id_spp_bulan_tahun','=','spp_bulan_tahun.id_spp_bulan_tahun')
                                        ->where('spp_bulan_tahun.bulan',$bulan_laporan)
                                        ->where('spp_bulan_tahun.tahun',$tahun_laporan)
                                        ->sum('nominal_spp');

        $get_total_penerimaan = SppBayarData::whereMonth('tanggal_bayar',$bulan_laporan)
                                            ->whereYear('tanggal_bayar',$tahun_laporan)
                                            ->sum('total_biaya');

        $data_rincian_penerimaan_detail = [
            'id_rincian_penerimaan'         => $id_rincian_penerimaan,
            'id_rincian_pengeluaran_detail' => null,
            'perincian'                     => 'Sumbangan Pembiayaan Pendidikan (SPP)',
            'rencana'                       => $get_total_tunggakan,
            'penerimaan'                    => $get_total_penerimaan
        ];
        RincianPenerimaanDetail::create($data_rincian_penerimaan_detail);

        // if ($pendapatan != '') {
            for ($i=0; $i < count($pendapatan); $i++) { 
                $data_rincian_penerimaan_detail = [
                    'id_rincian_penerimaan'         => $id_rincian_penerimaan,
                    'id_rincian_pengeluaran_detail' => $pendapatan[$i],
                    'perincian'                     => $keterangan_penerimaan[$i],
                    'rencana'                       => $rencana[$i],
                    'penerimaan'                    => $penerimaan[$i]
                ];
                RincianPenerimaanDetail::create($data_rincian_penerimaan_detail);
            }
        // }
        // else {
            // for ($i=0; $i < count($keterangan_penerimaan); $i++) { 
            //     $data_rincian_penerimaan_detail = [
            //         'id_rincian_penerimaan'         => $id_rincian_penerimaan,
            //         'id_rincian_pengeluaran_detail' => null,
            //         'perincian'                     => $keterangan_penerimaan[$i],
            //         'rencana'                       => $rencana[$i],
            //         'penerimaan'                    => $penerimaan[$i]
            //     ];
            //     RincianPenerimaanDetail::create($data_rincian_penerimaan_detail);
            // }
        // }

        $data_rincian_penerimaan_rekap = [
            'id_rincian_penerimaan'         => $id_rincian_penerimaan,
            'tanggal_bon_pengajuan'         => $tanggal_bon_pengajuan,
            'nominal_bon_pengajuan'         => $nominal_bon_pengajuan,
            'tanggal_realisasi_pengeluaran' => $tanggal_realisasi_pengeluaran,
            'nominal_realisasi_pengeluaran' => $realisasi_pengeluaran,
            'sisa_realisasi_pengeluaran'    => $nominal_bon_pengajuan - $realisasi_pengeluaran,
            'tanggal_penerimaan_bulan_ini'  => $tanggal_penerimaan_bulan_ini,
            'sisa_penerimaan_bulan_ini'     => $nominal_penerimaan_bulan_ini
        ];

        RincianPenerimaanRekap::create($data_rincian_penerimaan_rekap);

        for ($j=0; $j < count($bulan_rincian); $j++) {
            $data_penerimaan_tahun_ajaran = [
                'id_rincian_penerimaan' => $id_rincian_penerimaan,
                'bulan'                 => $bulan_rincian[$j],
                'tahun'                 => $tahun_rincian[$j],
                'pemasukan'             => $pemasukan[$j],
                'realisasi_pengeluaran' => $realisasi_pengeluaran_bulan[$j],
                'sisa_akhir_bulan'      => $sisa_akhir_bulan[$j]
            ];
            RincianPenerimaanTahunAjaran::create($data_penerimaan_tahun_ajaran);
        }

        return redirect('/admin/data-perincian-rab/rincian-penerimaan/'.$id)->with('message','Berhasil Input Data');
    }

    public function delete($id)
    {
        RincianPenerimaan::where('id_rincian_pengeluaran',$id)->delete();

        return redirect('/admin/data-perincian-rab/rincian-penerimaan/'.$id)->with('message','Berhasil Hapus Data');
    }
}
