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

        return view('Admin.rincian-pembelanjaan.rincian-pembelanjaan-tambah',compact('title','id','rincian_pengeluaran_detail','jenis_rincian'));
    }

    public function save(Request $request, $id)
    {

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
