<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\KelasSiswa;
use Illuminate\Support\Str;

class KelasSiswaController extends Controller
{
    public function index($id)
    {
        $title = 'Kelas Siswa | Petugas';

        return view('Petugas.kelas-siswa.main',compact('title','id'));
    }

    public function tambah($id)
    {
        $title        = 'Form Kelas Siswa | Petugas';
        $siswa        = Siswa::where('status_delete',0)->get();
        $kelas        = Kelas::where('status_delete',0)->where('id_kelas',$id)->firstOrFail();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Petugas.kelas-siswa.kelas-siswa-tambah',compact('title','siswa','kelas','tahun_ajaran','id'));
    }

    public function save(Request $request,$id)
    {
        $siswa        = $request->siswa;
        $tahun_ajaran = $request->tahun_ajaran;

        foreach ($siswa as $key => $value) {
            $id_kelas_siswa = (string)Str::uuid();

            $data_kelas_siswa[] = [
                'id_kelas_siswa'  => $id_kelas_siswa,
                'id_siswa'        => $siswa[$key],
                'id_kelas'        => $id,
                'id_tahun_ajaran' => $tahun_ajaran,
                'status_delete'   => 0
            ];
        }

        KelasSiswa::insert($data_kelas_siswa);

        return redirect('/petugas/kelas/siswa/'.$id)->with('message','Berhasil Input Siswa');
    }

    public function edit($id,$id_detail)
    {
        $title        = 'Form Kelas Siswa | Petugas';
        $row          = KelasSiswa::where('id_kelas_siswa',$id_detail)->firstOrFail();
        $siswa        = Siswa::where('status_delete',0)->get();
        $kelas        = Kelas::where('status_delete',0)->where('id_kelas',$id)->firstOrFail();
        $tahun_ajaran = TahunAjaran::where('status_delete',0)->get();

        return view('Petugas.kelas-siswa.kelas-siswa-edit',compact('title','row','siswa','kelas','tahun_ajaran','id','id_detail'));
    }

    public function update(Request $request,$id,$id_detail)
    {
        $siswa        = $request->siswa;
        $tahun_ajaran = $request->tahun_ajaran;

        $data_kelas_siswa = [
            'id_siswa'        => $siswa,
            'id_kelas'        => $id,
            'id_tahun_ajaran' => $tahun_ajaran
        ];

        KelasSiswa::where('id_kelas_siswa',$id_detail)->update($data_kelas_siswa);

        return redirect('/petugas/kelas/siswa/'.$id)->with('message','Berhasil Update Siswa');
    }

    public function delete($id,$id_detail)
    {
        KelasSiswa::where('id_kelas_siswa',$id_detail)->update(['status_delete' => 1]);

        return redirect('/petugas/kelas/siswa/'.$id)->with('message','Berhasil Hapus Siswa');
    }
}
