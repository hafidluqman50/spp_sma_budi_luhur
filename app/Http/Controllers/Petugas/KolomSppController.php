<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KolomSpp;
use Illuminate\Support\Str;

class KolomSppController extends Controller
{
    public function index()
    {
        $title = 'Kolom SPP | Petugas';

        return view('Petugas.kolom-spp.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Tambah Kolom SPP | Petugas';

        return view('Petugas.kolom-spp.kolom-spp-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nama_kolom_spp   = $request->nama_kolom_spp;
        $keterangan_kolom = $request->keterangan;

        $data_kolom_spp = [
            'nama_kolom_spp'   => $nama_kolom_spp,
            'slug_kolom_spp'   => Str::slug($nama_kolom_spp,'-'),
            'keterangan_kolom' => $keterangan_kolom,
            'status_delete'    => 0
        ];

        KolomSpp::create($data_kolom_spp);

        return redirect('/petugas/kolom-spp')->with('message','Berhasil Input Kolom SPP');
    }

    public function edit($id)
    {
        $title = 'Edit Kolom SPP | Petugas';
        $row   = KolomSpp::where('id_kolom_spp',$id)->firstOrFail();

        return view('Petugas.kolom-spp.kolom-spp-edit',compact('title','row','id'));
    }

    public function update(Request $request,$id)
    {
        $nama_kolom_spp   = $request->nama_kolom_spp;
        $keterangan_kolom = $request->keterangan;

        $data_kolom_spp = [
            'nama_kolom_spp'   => $nama_kolom_spp,
            'slug_kolom_spp'   => Str::slug($nama_kolom_spp,'-'),
            'keterangan_kolom' => $keterangan_kolom
        ];

        KolomSpp::where('id_kolom_spp',$id)->update($data_kolom_spp);

        return redirect('/petugas/kolom-spp')->with('message','Berhasil Update Kolom SPP');
    }

    public function delete($id)
    {
        KolomSpp::where('id_kolom_spp',$id)->update(['status_delete' => 1]);

        return redirect('/petugas/kolom-spp')->with('message','Berhasil Hapus Kolom SPP');
    }
}
