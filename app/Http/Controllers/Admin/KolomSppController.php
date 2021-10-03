<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KolomSpp;

class KolomSppController extends Controller
{
    public function index()
    {
        $title = 'Kolom SPP | Admin';

        return view('Admin.kolom-spp.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Tambah Kolom SPP | Admin';

        return view('Admin.kolom-spp.kolom-spp-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nama_kolom_spp = $request->nama_kolom_spp;

        $data_kolom_spp = [
            'nama_kolom_spp' => $nama_kolom_spp,
            'status_delete'  => 0
        ];

        KolomSpp::create($data_kolom_spp);

        return redirect('/admin/kolom-spp')->with('message','Berhasil Input Kolom SPP');
    }

    public function edit($id)
    {
        $title = 'Edit Kolom SPP | Admin';
        $row   = KolomSpp::where('id_kolom_spp',$id)->firstOrFail();

        return view('Admin.kolom-spp.kolom-spp-edit',compact('title','row','id'));
    }

    public function update(Request $request,$id)
    {
        $nama_kolom_spp = $request->nama_kolom_spp;

        $data_kolom_spp = [
            'nama_kolom_spp' => $nama_kolom_spp
        ];

        KolomSpp::where('id_kolom_spp',$id)->update($data_kolom_spp);

        return redirect('/admin/kolom-spp')->with('message','Berhasil Update Kolom SPP');
    }

    public function delete($id)
    {
        KolomSpp::where('id_kolom_spp')->update(['status_delete' => 1]);

        return redirect('/admin/kolom-spp')->with('message','Berhasil Hapus Kolom SPP');
    }
}