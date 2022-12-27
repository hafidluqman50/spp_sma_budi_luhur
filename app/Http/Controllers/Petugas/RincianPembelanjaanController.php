<?php

namespace App\Http\Controllers\Petugas;

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
        $title = 'Rincian Pembelanjaan | Petugas';

        return view('Petugas.rincian-pembelanjaan.main',compact('title','id'));
    }

    public function rincianPembelanjaanUangMakan($id)
    {
        $title = 'Rincian Pembelanjaan Uang Makan | Petugas';

        return view('Petugas.rincian-pembelanjaan.main-uang-makan',compact('title','id'));
    }

    public function tambahRincianPembelanjaan($id)
    {
        $title                      = 'Form Rincian Pembelanjaan | Petugas';
        $rincian_pengeluaran_detail = RincianPengeluaranSekolah::where('id_rincian_pengeluaran',$id)->get();

        return view('Petugas.rincian-pembelanjaan.rincian-pembelanjaan-tambah',compact('title','id','rincian_pengeluaran_detail'));
    }

    public function tambahRincianPembelanjaanUangMakan($id)
    {
        $title                      = 'Form Rincian Pembelanjaan | Petugas';
        $rincian_pengeluaran_detail = RincianPengeluaranUangMakan::where('id_rincian_pengeluaran',$id)->get();

        $tahun_ajaran = RincianPengeluaran::join('tahun_ajaran','rincian_pengeluaran.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')->where('id_rincian_pengeluaran',$id)->firstOrFail()->tahun_ajaran;

        $bulan_laporan = month(RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail()->bulan_laporan);
        $bulan = [0 => [7,8,9,10,11,12], 1 => [1,2,3,4,5,6]];

        return view('Petugas.rincian-pembelanjaan.rincian-pembelanjaan-uang-makan-tambah',compact('title','id','rincian_pengeluaran_detail','tahun_ajaran','bulan_laporan','bulan'));
    }

    public function save(Request $request, $id)
    {
        $kategori_rincian        = $request->kategori_rincian;
        $rincian_sekolah         = $request->rincian_sekolah;
        $rincian_uang_makan      = $request->rincian_uang_makan;
        $volume                  = $request->volume;
        $uang_masuk              = $request->uang_masuk;
        $uang_keluar             = $request->uang_keluar;
        $jenis_rincian           = $request->jenis_rincian;
        $keterangan_pembelanjaan = $request->keterangan_pembelanjaan;
        $tanggal_setor_dapur     = $request->tanggal_setor_dapur;

        $bulan_rincian                 = $request->bulan_rincian;
        $tahun_rincian                 = $request->tahun_rincian;
        $pemasukan                     = $request->pemasukan;
        $realisasi_pengeluaran_bulan   = $request->realisasi_pengeluaran_bulan;
        $sisa_akhir_bulan              = $request->sisa_akhir_bulan;

        if ($rincian_sekolah != '') {
            foreach ($rincian_sekolah as $key => $value) {
                $data_rincian_pembelanjaan = [
                    'id_rincian_pengeluaran'         => $id,
                    'kategori_rincian_pembelanjaan'  => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_sekolah' => $rincian_sekolah[$key],
                    'jenis_rincian_pembelanjaan'     => $jenis_rincian,
                    'keterangan_pembelanjaan'        => $keterangan_pembelanjaan[$key]
                ];

                RincianPembelanjaan::create($data_rincian_pembelanjaan);
            }
        }

        if ($rincian_uang_makan != '') {
            foreach ($rincian_uang_makan as $key => $value) {
                $data_rincian_pembelanjaan = [
                    'id_rincian_pengeluaran'            => $id,
                    'kategori_rincian_pembelanjaan'     => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_uang_makan' => $rincian_uang_makan[$key],
                    'jenis_rincian_pembelanjaan'        => $jenis_rincian,
                    'keterangan_pembelanjaan'           => $keterangan_pembelanjaan[$key]
                ];

                RincianPembelanjaan::create($data_rincian_pembelanjaan);
            }

            foreach ($bulan_rincian as $key => $value) {
                $data_rincian_pembelanjaan_tahun_ajaran = [
                    'id_rincian_pengeluaran' => $id,
                    'bulan'                  => $bulan_rincian[$key],
                    'tahun'                  => $tahun_rincian[$key],
                    'pemasukan'              => $pemasukan[$key],
                    'realisasi_pengeluaran'  => $realisasi_pengeluaran_bulan[$key],
                    'sisa_akhir_bulan'       => $sisa_akhir_bulan[$key]
                ];

                RincianPembelanjaanTahunAjaran::create($data_rincian_pembelanjaan_tahun_ajaran);
            }
        }

        if ($jenis_rincian == 'operasional') {
            $url = '/petugas/data-perincian-rab/rincian-pembelanjaan/'.$id;
        }
        else if ($jenis_rincian == 'uang-makan') {
            RincianPengeluaran::where('id_rincian_pengeluaran',$id)->update(['tanggal_setor_dapur'=>$tanggal_setor_dapur]);
            $url = '/petugas/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id;
        }

        return redirect($url)->with('message','Berhasil Input Data');
    }

    public function editRincianPembelanjaan($id)
    {
        $title          = 'Petugas | Form Rincian Pembelanjaan';
        $kategori_group = RincianPembelanjaan::where('id_rincian_pengeluaran',$id)
                                                ->where('jenis_rincian_pembelanjaan','operasional')
                                                ->groupBy('kategori_rincian_pembelanjaan')
                                                ->get();

        $rincian_pengeluaran_detail = RincianPengeluaranSekolah::where('id_rincian_pengeluaran',$id)->get();
        $rincian_pembelanjaan       = new RincianPembelanjaan;

        return view('Petugas.rincian-pembelanjaan.rincian-pembelanjaan-edit',compact('title','kategori_group','id','rincian_pembelanjaan','rincian_pengeluaran_detail'));
    }

    public function editRincianPembelanjaanUangMakan($id)
    {
        $title          = 'Petugas | Form Rincian Pembelanjaan';
        $kategori_group = RincianPembelanjaan::where('id_rincian_pengeluaran',$id)
                                                ->where('jenis_rincian_pembelanjaan','uang-makan')
                                                ->groupBy('kategori_rincian_pembelanjaan')
                                                ->get();

        $tanggal_setor_dapur        = RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail()->tanggal_setor_dapur;
        $rincian_pengeluaran_detail = RincianPengeluaranUangMakan::where('id_rincian_pengeluaran',$id)->get();
        $rincian_pembelanjaan       = new RincianPembelanjaan;

        $tahun_ajaran = RincianPengeluaran::join('tahun_ajaran','rincian_pengeluaran.id_tahun_ajaran','=','tahun_ajaran.id_tahun_ajaran')->where('id_rincian_pengeluaran',$id)->firstOrFail()->tahun_ajaran;

        $bulan_laporan = month(RincianPengeluaran::where('id_rincian_pengeluaran',$id)->firstOrFail()->bulan_laporan);
        $bulan = [0 => [7,8,9,10,11,12], 1 => [1,2,3,4,5,6]];

        $rincian_tahun_ajaran = new RincianPembelanjaanTahunAjaran;

        return view('Petugas.rincian-pembelanjaan.rincian-pembelanjaan-uang-makan-edit',compact('title','kategori_group','id','rincian_pembelanjaan','rincian_pengeluaran_detail','tanggal_setor_dapur','tahun_ajaran','bulan_laporan','bulan','rincian_tahun_ajaran'));
    }

    public function update(Request $request,$id)
    {
        // $kategori_rincian        = $request->kategori_rincian;
        // $rincian                 = $request->rincian;
        // $jenis_rincian           = $request->jenis_rincian;
        // $keterangan_pembelanjaan = $request->keterangan_pembelanjaan;
        // $id_rincian_pembelanjaan = $request->id_rincian_pembelanjaan;
        // $tanggal_setor_dapur     = $request->tanggal_setor_dapur;
        // $volume                  = $request->volume;
        // $uang_masuk              = $request->uang_masuk;
        // $uang_keluar             = $request->uang_keluar;

        $kategori_rincian        = $request->kategori_rincian;
        $rincian_sekolah         = $request->rincian_sekolah;
        $rincian_uang_makan      = $request->rincian_uang_makan;
        $volume                  = $request->volume;
        $uang_masuk              = $request->uang_masuk;
        $uang_keluar             = $request->uang_keluar;
        $jenis_rincian           = $request->jenis_rincian;
        $keterangan_pembelanjaan = $request->keterangan_pembelanjaan;
        $tanggal_setor_dapur     = $request->tanggal_setor_dapur;
        $id_rincian_pembelanjaan = $request->id_rincian_pembelanjaan;

        $bulan_rincian                        = $request->bulan_rincian;
        $tahun_rincian                        = $request->tahun_rincian;
        $pemasukan                            = $request->pemasukan;
        $realisasi_pengeluaran_bulan          = $request->realisasi_pengeluaran_bulan;
        $sisa_akhir_bulan                     = $request->sisa_akhir_bulan;
        $id_rincian_pembelanjaan_tahun_ajaran = $request->id_rincian_pembelanjaan_tahun_ajaran;

        // foreach ($rincian as $key => $value) {
        //     if ($id_rincian_pembelanjaan[$key] != '') {
        //         $data_rincian_pembelanjaan = [
        //             'kategori_rincian_pembelanjaan' => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
        //             'id_rincian_pengeluaran_detail' => $rincian[$key],
        //             'jenis_rincian_pembelanjaan'    => $jenis_rincian,
        //             'keterangan_pembelanjaan'       => $keterangan_pembelanjaan[$key]
        //         ];
        //         RincianPembelanjaan::where('id_rincian_pembelanjaan',$id_rincian_pembelanjaan[$key])->update($data_rincian_pembelanjaan);
        //     }
        //     else {
        //         $data_rincian_pembelanjaan = [
        //             'id_rincian_pengeluaran'        => $id,
        //             'kategori_rincian_pembelanjaan' => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
        //             'id_rincian_pengeluaran_detail' => $rincian[$key],
        //             'jenis_rincian_pembelanjaan'    => $jenis_rincian,
        //             'keterangan_pembelanjaan'       => $keterangan_pembelanjaan[$key]
        //         ];
        //         RincianPembelanjaan::create($data_rincian_pembelanjaan);
        //     }

        // }

        if ($rincian_sekolah != '') {
            foreach ($rincian_sekolah as $key => $value) {
                $data_rincian_pembelanjaan = [
                    'kategori_rincian_pembelanjaan'  => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_sekolah' => $rincian_sekolah[$key],
                    'jenis_rincian_pembelanjaan'     => $jenis_rincian,
                    'keterangan_pembelanjaan'        => $keterangan_pembelanjaan[$key]
                ];

                RincianPembelanjaan::where('id_rincian_pembelanjaan',$id_rincian_pembelanjaan[$key])->update($data_rincian_pembelanjaan);
            }
        }

        if ($rincian_uang_makan != '') {
            foreach ($rincian_uang_makan as $key => $value) {
                $data_rincian_pembelanjaan = [
                    'kategori_rincian_pembelanjaan'     => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_uang_makan' => $rincian_uang_makan[$key],
                    'jenis_rincian_pembelanjaan'        => $jenis_rincian,
                    'keterangan_pembelanjaan'           => $keterangan_pembelanjaan[$key]
                ];

                RincianPembelanjaan::where('id_rincian_pembelanjaan',$id_rincian_pembelanjaan[$key])->update($data_rincian_pembelanjaan);
            }

            foreach ($bulan_rincian as $key => $value) {
                $data_rincian_pembelanjaan_tahun_ajaran = [
                    'id_rincian_pengeluaran' => $id,
                    'bulan'                  => $bulan_rincian[$key],
                    'tahun'                  => $tahun_rincian[$key],
                    'pemasukan'              => $pemasukan[$key],
                    'realisasi_pengeluaran'  => $realisasi_pengeluaran_bulan[$key],
                    'sisa_akhir_bulan'       => $sisa_akhir_bulan[$key]
                ];
                if ($id_rincian_pembelanjaan_tahun_ajaran[$key] == '') {
                    RincianPembelanjaanTahunAjaran::create($data_rincian_pembelanjaan_tahun_ajaran);
                }
                else {
                    RincianPembelanjaanTahunAjaran::where('id_rincian_pembelanjaan_tahun_ajaran',$id_rincian_pembelanjaan_tahun_ajaran[$key])->update($data_rincian_pembelanjaan_tahun_ajaran);
                }
            }
        }

        if ($jenis_rincian == 'operasional') {
            $url = '/petugas/data-perincian-rab/rincian-pembelanjaan/'.$id;
        }
        else if ($jenis_rincian == 'uang-makan') {
            RincianPengeluaran::where('id_rincian_pengeluaran',$id)->update(['tanggal_setor_dapur'=>$tanggal_setor_dapur]);
            $url = '/petugas/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id;
        }

        return redirect($url)->with('message','Berhasil Update Data');
    }

    public function delete($id,$id_detail)
    {
        $ket = RincianPembelanjaan::where('id_rincian_pengeluaran',$id)
                                    ->where('id_rincian_pembelanjaan',$id_detail)
                                    ->firstOrFail()->jenis_rincian_pembelanjaan;

        RincianPembelanjaan::where('id_rincian_pengeluaran',$id)
                            ->where('id_rincian_pengeluaran_detail',$id_detail)
                            ->delete();

        if ($ket == 'uang-makan') {
            $url = '/petugas/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id;
        }
        else {
            $url = '/petugas/data-perincian-rab/rincian-pembelanjaan/'.$id;
        }

        return redirect($url)->with('message','Berhasil Hapus Data');
    }
}
