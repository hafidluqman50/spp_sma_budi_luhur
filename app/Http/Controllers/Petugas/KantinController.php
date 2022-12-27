<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kantin;
// use App\Models\KolomSpp;
use Illuminate\Support\Str;

class KantinController extends Controller
{
    public function index()
    {
        $title = 'Kantin | Petugas';

        return view('Petugas.kantin.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Form Kantin | Petugas';

        return view('Petugas.kantin.kantin-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nama_kantin    = $request->nama_kantin;
        $lokasi_kantin  = $request->lokasi_kantin;
        $biaya_perbulan = $request->biaya_perbulan;

        $data_kantin = [
            'nama_kantin'      => $nama_kantin,
            'slug_nama_kantin' => Str::slug($nama_kantin,'-'),
            'lokasi_kantin'    => $lokasi_kantin,
            'biaya_perbulan'   => $biaya_perbulan,
            'status_delete'    => 0
        ];

        Kantin::create($data_kantin);

        return redirect('/petugas/kantin')->with('message','Berhasil Input Kantin');
    }

    public function edit($id)
    {
        $title = 'Form Kantin | Petugas';
        $row   = Kantin::where('id_kantin',$id)->firstOrFail();

        return view('Petugas.kantin.kantin-edit',compact('title','row','id'));
    }

    public function update(Request $request,$id)
    {
        $nama_kantin    = $request->nama_kantin;
        $lokasi_kantin  = $request->lokasi_kantin;
        $biaya_perbulan = $request->biaya_perbulan;

        $kantin = Kantin::where('id_kantin', $id)->firstOrFail();

        $data_kantin = [
            'nama_kantin'      => $nama_kantin,
            'slug_nama_kantin' => Str::slug($nama_kantin,'-'),
            'lokasi_kantin'    => $lokasi_kantin,
            'biaya_perbulan'   => $biaya_perbulan
        ];

        Kantin::where('id_kantin',$id)->update($data_kantin);

        return redirect('/petugas/kantin')->with('message','Berhasil Update Kantin');
    }

    public function delete($id)
    {
        Kantin::where('id_kantin',$id)->update(['status_delete'=>1]);

        return redirect('/petugas/kantin')->with('message','Berhasil Hapus Kantin');
    }
}
