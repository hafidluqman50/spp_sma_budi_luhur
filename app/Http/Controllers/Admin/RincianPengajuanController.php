<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RincianPengeluaranDetail;
use App\Models\RincianPengajuan;

class RincianPengajuanController extends Controller
{
    public function index($id)
    {
        $title = 'Admin | Rincian Pengajuan';

        return view('Admin.rincian-pengajuan.main',compact('title','id'));
    }

    public function tambah($id)
    {
        $title   = 'Admin | Tambah Rincian Pengajuan';
        $rincian = RincianPengeluaranDetail::where('uraian_rab','!=','')->get();

        return view('Admin.rincian-pengajuan.rincian-pengajuan-tambah',compact('title','rincian','id'));
    }

    public function save(Request $request, $id)
    {
        $kategori_rincian     = $request->kategori_rincian;
        $rincian              = $request->rincian;
        $keterangan_pengajuan = $request->keterangan_pengajuan;
        // $volume           = $request->volume;
        // $uang_masuk       = $request->uang_masuk;
        // $uang_keluar      = $request->uang_keluar;
        // $jenis_rincian    = $request->jenis_rincian;

        foreach ($rincian as $key => $value) {
            $data_rincian_pengajuan = [
                'id_rincian_pengeluaran'        => $id,
                'kategori_rincian_pengajuan'    => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                'id_rincian_pengeluaran_detail' => $rincian[$key],
                'keterangan_pengajuan'          => $keterangan_pengajuan[$key]
                // 'jenis_rincian_pembelanjaan'    => $jenis_rincian
            ];

            RincianPengajuan::create($data_rincian_pengajuan);
        }

        return redirect('/admin/data-perincian-rab/rincian-pengajuan/'.$id)->with('message','Berhasil Input Data');
    }

    public function delete($id,$id_rincian_pengajuan)
    {
        RincianPengajuan::where('id_rincian_pengeluaran',$id)->where('id_rincian_pengajuan',$id_rincian_pengajuan)->delete();

        return redirect('/admin/data-perincian-rab/rincian-pengajuan/'.$id)->with('message','Berhasil Hapus Rincian Pengajuan');
    }
}
