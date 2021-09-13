<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $title = 'Kelas | Admin';

        return view('Admin.kelas.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Form Kelas | Admin';

        return view('Admin.kelas.kelas-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $kelas = $request->kelas;

        $data_kelas = [
            'kelas'         => $kelas,
            'status_delete' => 0,
        ];   

        Kelas::create($data_kelas);

        return redirect('/admin/kelas')->with('message','Berhasil Input Kelas');
    }

    public function edit($id)
    {
        $title = 'Form Kelas | Admin';
        $row   = Kelas::where('id_kelas',$id)->firstOrFail();

        return view('Admin.kelas.kelas-edit',compact('title','row','id'));
    }

    public function update(Request $request,$id)
    {
        $kelas = $request->kelas;

        $data_kelas = [
            'kelas' => $kelas
        ];   

        Kelas::where('id_kelas',$id)->update($data_kelas);

        return redirect('/admin/kelas')->with('message','Berhasil Update Kelas');
    }

    public function delete($id)
    {
        Kelas::where('id_kelas',$id)->update(['status_delete'=>1]);

        return redirect('/admin/kelas')->with('message','Berhasil Delete Kelas');
    }
}
