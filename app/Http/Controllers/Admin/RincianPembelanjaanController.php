<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaranDetail;
use App\Models\RincianPembelanjaan;

class RincianPembelanjaanController extends Controller
{
    public function rincianPembelanjaan($id)
    {
        $title = 'Rincian Pembelanjaan | Admin';

        return view('Admin.rincian-pembelanjaan.main',compact('title','id'));
    }

    public function rincianPembelanjaanUangMakan($id)
    {
        $title = 'Rincian Pembelanjaan Uang Makan | Admin';

        return view('Admin.rincian-pembelanjaan.main-uang-makan',compact('title','id'));
    }

    public function tambahRincianPembelanjaan($id)
    {
        $title                      = 'Form Rincian Pembelanjaan | Admin';
        $rincian_pengeluaran_detail = RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)->get();

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-tambah',compact('title','id','rincian_pengeluaran_detail'));
    }

    public function tambahRincianPembelanjaanUangMakan($id)
    {
        $title                      = 'Form Rincian Pembelanjaan | Admin';
        $rincian_pengeluaran_detail = RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)->get();

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-uang-makan-tambah',compact('title','id','rincian_pengeluaran_detail'));
    }

    public function save(Request $request, $id)
    {
        $kategori_rincian        = $request->kategori_rincian;
        $rincian                 = $request->rincian;
        $volume                  = $request->volume;
        $uang_masuk              = $request->uang_masuk;
        $uang_keluar             = $request->uang_keluar;
        $jenis_rincian           = $request->jenis_rincian;
        $keterangan_pembelanjaan = $request->keterangan_pembelanjaan;

        foreach ($rincian as $key => $value) {
            $data_rincian_pembelanjaan = [
                'id_rincian_pengeluaran'        => $id,
                'kategori_rincian_pembelanjaan' => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                'id_rincian_pengeluaran_detail' => $rincian[$key],
                'jenis_rincian_pembelanjaan'    => $jenis_rincian,
                'keterangan_pembelanjaan'       => $keterangan_pembelanjaan[$key]
            ];

            RincianPembelanjaan::create($data_rincian_pembelanjaan);
        }

        if ($jenis_rincian == 'operasional') {
            $url = '/admin/data-perincian-rab/rincian-pembelanjaan/'.$id;
        }
        else if ($jenis_rincian == 'uang-makan') {
            $url = '/admin/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id;
        }

        return redirect($url)->with('message','Berhasil Input Data');
    }

    public function editRincianPembelanjaan($id)
    {
        $title          = 'Admin | Form Rincian Pembelanjaan';
        $kategori_group = RincianPembelanjaan::where('id_rincian_pengeluaran',$id)
                                                ->where('jenis_rincian_pembelanjaan','operasional')
                                                ->groupBy('kategori_rincian_pembelanjaan')
                                                ->get();
        $rincian_pengeluaran_detail = RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)->get();
        $rincian_pembelanjaan = new RincianPembelanjaan;

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-edit',compact('title','kategori_group','id','rincian_pembelanjaan','rincian_pengeluaran_detail'));
    }

    public function editRincianPembelanjaanUangMakan($id)
    {
        $title          = 'Admin | Form Rincian Pembelanjaan';
        $kategori_group = RincianPembelanjaan::where('id_rincian_pengeluaran',$id)
                                                ->where('jenis_rincian_pembelanjaan','uang-makan')
                                                ->groupBy('kategori_rincian_pembelanjaan')
                                                ->get();
        $rincian_pengeluaran_detail = RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)->get();
        $rincian_pembelanjaan = new RincianPembelanjaan;

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-uang-makan-edit',compact('title','kategori_group','id','rincian_pembelanjaan','rincian_pengeluaran_detail'));
    }

    public function update(Request $request,$id)
    {
        $kategori_rincian        = $request->kategori_rincian;
        $rincian                 = $request->rincian;
        $jenis_rincian           = $request->jenis_rincian;
        $keterangan_pembelanjaan = $request->keterangan_pembelanjaan;
        $id_rincian_pembelanjaan = $request->id_rincian_pembelanjaan;
        // $volume                  = $request->volume;
        // $uang_masuk              = $request->uang_masuk;
        // $uang_keluar             = $request->uang_keluar;

        foreach ($rincian as $key => $value) {
            if ($id_rincian_pembelanjaan[$key] != '') {
                $data_rincian_pembelanjaan = [
                    'kategori_rincian_pembelanjaan' => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_detail' => $rincian[$key],
                    'jenis_rincian_pembelanjaan'    => $jenis_rincian,
                    'keterangan_pembelanjaan'       => $keterangan_pembelanjaan[$key]
                ];
                RincianPembelanjaan::where('id_rincian_pembelanjaan',$id_rincian_pembelanjaan[$key])->update($data_rincian_pembelanjaan);
            }
            else {
                $data_rincian_pembelanjaan = [
                    'id_rincian_pengeluaran'        => $id,
                    'kategori_rincian_pembelanjaan' => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'id_rincian_pengeluaran_detail' => $rincian[$key],
                    'jenis_rincian_pembelanjaan'    => $jenis_rincian,
                    'keterangan_pembelanjaan'       => $keterangan_pembelanjaan[$key]
                ];
                RincianPembelanjaan::create($data_rincian_pembelanjaan);
            }

        }

        if ($jenis_rincian == 'operasional') {
            $url = '/admin/data-perincian-rab/rincian-pembelanjaan/'.$id;
        }
        else if ($jenis_rincian == 'uang-makan') {
            $url = '/admin/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id;
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
            $url = '/admin/data-perincian-rab/rincian-pembelanjaan-uang-makan/'.$id;
        }
        else {
            $url = '/admin/data-perincian-rab/rincian-pembelanjaan/'.$id;
        }

        return redirect($url)->with('message','Berhasil Hapus Data');
    }
}
