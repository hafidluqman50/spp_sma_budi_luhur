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
        $jenis_rincian              = 'operasional';

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-tambah',compact('title','id','rincian_pengeluaran_detail','jenis_rincian'));
    }

    public function tambahRincianPembelanjaanUangMakan($id)
    {
        $title                      = 'Form Rincian Pembelanjaan | Admin';
        $rincian_pengeluaran_detail = RincianPengeluaranDetail::where('id_rincian_pengeluaran',$id)->get();
        $jenis_rincian              = 'uang-makan';

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-uang-makan-tambah',compact('title','id','rincian_pengeluaran_detail','jenis_rincian'));
    }

    public function save(Request $request, $id)
    {
        $kategori_rincian = $request->kategori_rincian;
        $rincian          = $request->rincian;
        $volume           = $request->volume;
        $uang_masuk       = $request->uang_masuk;
        $uang_keluar      = $request->uang_keluar;
        $jenis_rincian    = $request->jenis_rincian;

        foreach ($rincian as $key => $value) {
            $data_rincian_pembelanjaan = [
                'id_rincian_pengeluaran'        => $id,
                'kategori_rincian_pembelanjaan' => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                'id_rincian_pengeluaran_detail' => $rincian[$key],
                'jenis_rincian_pembelanjaan'    => $jenis_rincian
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

    public function editRincianPembelanjaan($id,$id_detail)
    {

    }

    public function editRincianPembelanjaanUangMakan($id,$id_detail)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id,$id_detail)
    {

    }
}
