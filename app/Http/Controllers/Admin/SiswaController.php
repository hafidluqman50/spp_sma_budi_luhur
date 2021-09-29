<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Siswa;
use App\Models\Keluarga;
use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        $title = 'Data Siswa | Admin';

        return view('Admin.siswa.main',compact('title'));
    }

    public function tambah()
    {
        $title    = 'Form Siswa | Admin';
        $keluarga = Siswa::where('status_delete',0)->get();

        return view('Admin.siswa.siswa-tambah',compact('title','keluarga'));
    }

    public function save(Request $request)
    {
        $id_siswa        = (string)Str::uuid();
        $nisn            = $request->nisn;
        $nama_siswa      = $request->nama_siswa;
        $jenis_kelamin   = $request->jenis_kelamin;
        $wilayah         = $request->wilayah;
        $tanggal_lahir   = date('Y-m-d');
        $nama_ayah       = $request->nama_ayah;
        $nama_ibu        = $request->nama_ibu;
        $nomor_orang_tua = $request->nomor_wa_ortu;
        $keluarga        = $request->keluarga;

        $data_siswa = [
            'id_siswa'        => $id_siswa,
            'nisn'            => $nisn,
            'nama_siswa'      => $nama_siswa,
            'jenis_kelamin'   => $jenis_kelamin,
            'tanggal_lahir'   => $tanggal_lahir,
            'wilayah'         => $wilayah,
            'nama_ayah'       => $nama_ayah,
            'nama_ibu'        => $nama_ibu,
            'nomor_orang_tua' => $nomor_orang_tua,
            'status_delete'   => 0
        ];

        Siswa::create($data_siswa);

        if ($keluarga != '' || $keluarga != null) {
            $data_keluarga = [
                'id_siswa'          => $id_siswa,
                'id_siswa_keluarga' => $keluarga
            ];

            Keluarga::create($data_keluarga);
        }

        $data_user = [
            'name'          => 'Ortu '.$nama_siswa,
            'username'      => $nisn,
            'password'      => bcrypt($nisn),
            'level_user'    => 0,
            'status_akun'   => 1,
            'status_delete' => 0
        ];

        User::create($data_user);

        return redirect('/admin/siswa')->with('message','Berhasil Input Siswa');
    }

    public function edit($id)
    {
        $title    = 'Form Siswa | Admin';
        $row      = Siswa::where('id_siswa',$id)->firstOrFail();
        $keluarga = Siswa::where('status_delete',0)->get();

        return view('Admin.siswa.siswa-edit',compact('title','row','keluarga','id'));
    }

    public function update(Request $request,$id)
    {
        $nisn            = $request->nisn;
        $nama_siswa      = $request->nama_siswa;
        $jenis_kelamin   = $request->jenis_kelamin;
        $tanggal_lahir   = date('Y-m-d');
        $nama_ayah       = $request->nama_ayah;
        $nama_ibu        = $request->nama_ibu;
        $nomor_orang_tua = $request->nomor_wa_ortu;
        $keluarga        = $request->keluarga;

        if ($id == $keluarga) {
            return redirect('/admin/siswa/edit/'.$id)->withInput();
        }

        $data_siswa = [
            'nisn'            => $nisn,
            'nama_siswa'      => $nama_siswa,
            'jenis_kelamin'   => $jenis_kelamin,
            'tanggal_lahir'   => $tanggal_lahir,
            'nama_ayah'       => $nama_ayah,
            'nama_ibu'        => $nama_ibu,
            'nomor_orang_tua' => $nomor_orang_tua
        ];

        Siswa::where('id_siswa',$id)->update($data_siswa);

        if ($keluarga != '' || $keluarga != null) {
            $data_keluarga = [
                'id_siswa_keluarga' => $keluarga
            ];

            Keluarga::where('id_siswa',$id)->update($data_keluarga);
        }

        $data_user = [
            'name'          => 'Ortu '.$nama_siswa,
            'username'      => $nisn,
            'password'      => bcrypt($nisn),
        ];

        User::where('username',$nisn)->update($data_user);

        return redirect('/admin/siswa')->with('message','Berhasil Update Siswa');
    }

    public function delete($id)
    {
        Siswa::where('id_siswa',$id)->update(['status_delete'=>1]);

        return redirect('/admin/siswa')->with('message','Berhasil Delete Siswa');
    }
}
