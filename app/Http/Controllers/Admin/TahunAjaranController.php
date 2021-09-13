<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $title = 'TahunAjaran | Admin';

        return view('Admin.tahun-ajaran.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Form TahunAjaran | Admin';

        return view('Admin.tahun-ajaran.tahun-ajaran-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $tahun_ajaran = $request->tahun_ajaran;

        $data_tahun_ajaran = [
            'tahun_ajaran'  => $tahun_ajaran,
            'status_delete' => 0,
        ];   

        TahunAjaran::create($data_tahun_ajaran);

        return redirect('/admin/tahun-ajaran')->with('message','Berhasil Input Tahun Ajaran');
    }

    public function edit($id)
    {
        $title = 'Form Tahun Ajaran | Admin';
        $row   = TahunAjaran::where('id_tahun_ajaran',$id)->firstOrFail();

        return view('Admin.tahun-ajaran.tahun-ajaran-edit',compact('title','row','id'));
    }

    public function update(Request $request,$id)
    {
        $tahun_ajaran = $request->tahun_ajaran;

        $data_tahun_ajaran = [
            'tahun_ajaran' => $tahun_ajaran
        ];   

        TahunAjaran::where('id_tahun_ajaran',$id)->update($data_tahun_ajaran);

        return redirect('/admin/tahun-ajaran')->with('message','Berhasil Update Tahun Ajaran');
    }

    public function delete($id)
    {
        TahunAjaran::where('id_tahun_ajaran',$id)->update(['status_delete'=>1]);

        return redirect('/admin/tahun-ajaran')->with('message','Berhasil Delete TahunAjaran');
    }
}
