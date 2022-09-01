<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sapras;

class SaprasController extends Controller
{
    public function index($id)
    {
        $title = 'Admin | Rincian Pengajuan';

        return view('Admin.sapras.main',compact('title','id'));
    }

    public function tambah($id)
    {
        $title   = 'Admin | Tambah Rincian Pengajuan';

        return view('Admin.sapras.sapras-tambah',compact('title','id'));
    }

    public function save(Request $request, $id)
    {
        $kategori_rincian = $request->kategori_rincian;
        $nama_barang      = $request->nama_barang;
        $qty              = $request->qty;
        $ket              = $request->ket;
        $harga_barang     = $request->harga_barang;
        $jumlah           = $request->jumlah;

        foreach ($nama_barang as $key => $value) {
            $data_rincian_pengajuan = [
                'id_rincian_pengeluaran' => $id,
                'kategori_sapras'        => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                'nama_barang'            => $nama_barang[$key],
                'qty'                    => $qty[$key],
                'ket'                    => $ket[$key],
                'harga_barang'           => $harga_barang[$key],
                'jumlah'                 => $jumlah[$key]
            ];

            Sapras::create($data_rincian_pengajuan);
        }

        return redirect('/admin/data-perincian-rab/sapras/'.$id)->with('message','Berhasil Input Data');
    }

    public function delete($id,$id_sapras)
    {
        Sapras::where('id_rincian_pengeluaran',$id)->where('id_sapras',$id_sapras)->delete();

        return redirect('/admin/data-perincian-rab/sapras/'.$id)->with('message','Berhasil Hapus Data Sapras');
    }
}
