<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use Illuminate\Support\Str;

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
            'slug_kelas'    => Str::slug($kelas,'-'),
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
            'kelas'      => $kelas,
            'slug_kelas' => Str::slug($kelas,'-')
        ];   

        Kelas::where('id_kelas',$id)->update($data_kelas);

        return redirect('/admin/kelas')->with('message','Berhasil Update Kelas');
    }

    public function delete($id)
    {
        Kelas::where('id_kelas',$id)->update(['status_delete'=>1]);

        return redirect('/admin/kelas')->with('message','Berhasil Delete Kelas');
    }

    public function naikKelasForm()
    {
        $title        = 'Admin | Naik Kelas Form';
        $kelas        = Kelas::where('status_delete',0)->get();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Admin.kelas.naik-kelas',compact('title','kelas','tahun_ajaran'));
    }

    public function naikKelasSave(Request $request)
    {
        $dari_tahun_ajaran = $request->dari_tahun_ajaran;
        $dari_kelas        = $request->dari_kelas;
        $ke_tahun_ajaran   = $request->ke_tahun_ajaran;
        $ke_kelas          = $request->ke_kelas;

        $get_siswa = KelasSiswa::where('id_kelas',$dari_kelas)
                                ->where('id_tahun_ajaran',$dari_tahun_ajaran)
                                ->get();

        foreach ($get_siswa as $key => $value) {
            $data_naik_kelas = [
                'id_siswa'        => $value->id_siswa,
                'id_kelas'        => $ke_kelas,
                'id_tahun_ajaran' => $ke_tahun_ajaran,
                'status_delete'   => 0
            ];

            KelasSiswa::firstOrCreate($data_naik_kelas);
        }

        return redirect('/admin/kelas')->with('message','Berhasil Naik Kelas');
    }
}
