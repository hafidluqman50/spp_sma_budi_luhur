<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kantin;
use App\Models\KolomSpp;

class KantinController extends Controller
{
    public function index()
    {
        $title = 'Kantin | Admin';

        return view('Admin.kantin.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Form Kantin | Admin';

        return view('Admin.kantin.kantin-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nama_kantin    = $request->nama_kantin;
        $lokasi_kantin  = $request->lokasi_kantin;
        $biaya_perbulan = $request->biaya_perbulan;

        $data_kantin = [
            'nama_kantin'    => $nama_kantin,
            'lokasi_kantin'  => $lokasi_kantin,
            'biaya_perbulan' => $biaya_perbulan,
            'status_delete'  => 0
        ];

        $data_kolom_spp = [
            'nama_kolom_spp'   => $nama_kantin,
            'keterangan_kolom' => $biaya_perbulan,
            'status_delete'    => 0
        ];

        Kantin::create($data_kantin);
        KolomSpp::create($data_kolom_spp);

        return redirect('/admin/kantin')->with('message','Berhasil Input Kantin');
    }

    public function edit($id)
    {
        $title = 'Form Kantin | Admin';
        $row   = Kantin::where('id_kantin',$id)->firstOrFail();

        return view('Admin.kantin.kantin-edit',compact('title','row','id'));
    }

    public function update(Request $request,$id)
    {
        $nama_kantin    = $request->nama_kantin;
        $lokasi_kantin  = $request->lokasi_kantin;
        $biaya_perbulan = $request->biaya_perbulan;

        $kantin = Kantin::where('id_kantin', $id)->firstOrFail();
        $kolom_spp = KolomSpp::where('nama_kolom_spp', $kantin->nama_kantin)->firstOrFail();

        $data_kantin = [
            'nama_kantin'    => $nama_kantin,
            'lokasi_kantin'  => $lokasi_kantin,
            'biaya_perbulan' => $biaya_perbulan
        ];

        $data_kolom_spp = [
            'nama_kolom_spp'   => $nama_kantin,
            'keterangan_kolom' => $biaya_perbulan,
            'status_delete'    => 0
        ];

        Kantin::where('id_kantin',$id)->update($data_kantin);  
        KolomSpp::where('id_kolom_spp',$kolom_spp->id_kolom_spp)->update($data_kolom_spp);

        return redirect('/admin/kantin')->with('message','Berhasil Update Kantin');
    }

    public function delete($id)
    {
        Kantin::where('id_kantin',$id)->update(['status_delete'=>1]);

        return redirect('/admin/kantin')->with('message','Berhasil Hapus Kantin');
    }
}
