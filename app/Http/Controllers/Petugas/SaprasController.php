<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sapras;

class SaprasController extends Controller
{
    public function index($id)
    {
        $title = 'Petugas | Rincian Pengajuan';

        return view('Petugas.sapras.main',compact('title','id'));
    }

    public function tambah($id)
    {
        $title   = 'Petugas | Tambah Rincian Pengajuan';

        return view('Petugas.sapras.sapras-tambah',compact('title','id'));
    }

    public function save(Request $request, $id)
    {
        $pemohon            = $request->pemohon;
        $keterangan_pemohon = $request->keterangan_pemohon;
        $kategori_rincian   = $request->kategori_rincian;
        $nama_barang        = $request->nama_barang;
        $qty                = $request->qty;
        $ket                = $request->ket;
        $harga_barang       = $request->harga_barang;
        $jumlah             = $request->jumlah;

        foreach ($nama_barang as $key => $value) {
            $data_rincian_pengajuan = [
                'id_rincian_pengeluaran' => $id,
                'kategori_sapras'        => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                'nama_barang'            => $nama_barang[$key],
                'qty'                    => $qty[$key],
                'ket'                    => $ket[$key],
                'harga_barang'           => $harga_barang[$key],
                'jumlah'                 => $jumlah[$key],
                'pemohon'                => $pemohon[$key],
                'keterangan_pemohon'     => $keterangan_pemohon[$key]
            ];

            Sapras::create($data_rincian_pengajuan);
        }

        return redirect('/petugas/data-perincian-rab/sapras/'.$id)->with('message','Berhasil Input Data');
    }

    public function edit($id)
    {
        $title = 'Petugas | Form Sapras';
        // $kategori_sapras = Sapras::where('id_rincian_pengeluaran',$id)
        //                         ->groupBy('kategori_sapras')
        //                         ->get();

        $pemohon = Sapras::where('id_rincian_pengeluaran',$id)
                          ->groupBy('pemohon')
                          ->get();

        $sapras = new Sapras;

        return view('Petugas.sapras.sapras-edit',compact('title','pemohon','sapras','id'));
    }

    public function update(Request $request,$id)
    {
        $pemohon            = $request->pemohon;
        $keterangan_pemohon = $request->keterangan_pemohon;
        $kategori_rincian   = $request->kategori_rincian;
        $nama_barang        = $request->nama_barang;
        $qty                = $request->qty;
        $ket                = $request->ket;
        $harga_barang       = $request->harga_barang;
        $jumlah             = $request->jumlah;
        $id_sapras          = $request->id_sapras;

        foreach ($nama_barang as $key => $value) {
            if ($id_sapras[$key] != '') {
                $data_rincian_pengajuan = [
                    'kategori_sapras'        => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'nama_barang'            => $nama_barang[$key],
                    'qty'                    => $qty[$key],
                    'ket'                    => $ket[$key],
                    'harga_barang'           => $harga_barang[$key],
                    'jumlah'                 => $jumlah[$key],
                    'pemohon'                => $pemohon[$key],
                    'keterangan_pemohon'     => $keterangan_pemohon[$key]
                ];

                Sapras::where('id_sapras',$id_sapras[$key])->update($data_rincian_pengajuan);
            }
            else {
                $data_rincian_pengajuan = [
                    'id_rincian_pengeluaran' => $id,
                    'kategori_sapras'        => isset($kategori_rincian[$key]) ? $kategori_rincian[$key] : '-',
                    'nama_barang'            => $nama_barang[$key],
                    'qty'                    => $qty[$key],
                    'ket'                    => $ket[$key],
                    'harga_barang'           => $harga_barang[$key],
                    'jumlah'                 => $jumlah[$key],
                    'pemohon'                => $pemohon[$key],
                    'keterangan_pemohon'     => $keterangan_pemohon[$key]
                ];

                Sapras::create($data_rincian_pengajuan);
            }
        }

        return redirect('/petugas/data-perincian-rab/sapras/'.$id)->with('message','Berhasil Update Data');
    }

    public function delete($id,$id_sapras)
    {
        Sapras::where('id_rincian_pengeluaran',$id)->where('id_sapras',$id_sapras)->delete();

        return redirect('/petugas/data-perincian-rab/sapras/'.$id)->with('message','Berhasil Hapus Data Sapras');
    }
}
