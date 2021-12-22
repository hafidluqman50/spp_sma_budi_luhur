<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $title = 'Data Petugas | Admin';

        return view('Admin.petugas.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Tambah Petugas | Admin';

        return view('Admin.petugas.petugas-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nama_petugas    = $request->nama_petugas;
        $username        = $request->username;
        $password        = $request->password;
        $jabatan_petugas = $request->jabatan_petugas;
        $id_users        = (string)Str::uuid();

        if (User::where('username',$username)->count()>1) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'id_users'      => $id_users,
            'name'          => $nama_petugas,
            'username'      => $username,
            'password'      => bcrypt($password),
            'level_user'    => 2,
            'status_akun'   => 1,
            'status_delete' => 0
        ];

        User::create($data_user);

        $data_petugas = [
            'id_users'        => $id_users,
            'nama_petugas'    => $nama_petugas,
            'jabatan_petugas' => $jabatan_petugas,
            'status_delete'   => 0,
        ];

        Petugas::create($data_petugas);

        return redirect('/admin/data-petugas')->with('message','Berhasil Input Petugas');
    }

    public function edit($id)
    {
        $title = 'Edit Petugas | Admin';
        $row   = Petugas::join('users','petugas.id_users','=','users.id_users')->where('id_petugas',$id)->firstOrFail();

        return view('Admin.petugas.petugas-edit',compact('title','row','id'));
    }

    public function update(Request $request, $id)
    {
        $nama_petugas    = $request->nama_petugas;
        $username        = $request->username;
        $password        = $request->password;
        $jabatan_petugas = $request->jabatan_petugas;

        if (User::where('username',$username)->count()>1) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'name'          => $nama_petugas,
            'username'      => $username,
            'password'      => bcrypt($password)
        ];

        $data_petugas = [
            'nama_petugas'    => $nama_petugas,
            'jabatan_petugas' => $jabatan_petugas
        ];

        if ($username == '' && $password == '') {
            unset($data_user['username']);
            unset($data_user['password']);
        }
        elseif($username == '') {
            unset($data_user['username']);
        }
        elseif ($password == '') {
            unset($data_user['password']);
        }

        $get_id_user = Petugas::where('id_petugas',$id)->firstOrFail()->id_users;

        User::where('id_users',$get_id_user)->update($data_user);
        Petugas::where('id_petugas',$id)->update($data_petugas);

        return redirect('/admin/data-petugas')->with('message','Berhasil Update Petugas');
    }

    public function delete($id)
    {
        $get = Petugas::where('id_petugas',$id);
        // $foto = $get->firstOrFail()->foto_profile;
        User::where('id_users',$get->firstOrFail()->id_users)->update(['status_delete'=>1]);
        $get->update(['status_delete' => 1]);


        return redirect('/admin/data-petugas');
    }

    public function statusPetugas($id) 
    {
        $petugas = Petugas::where('id_petugas',$id)->firstOrFail();
        $users   = User::where('id_users',$petugas->id_users);
        if ($users->firstOrFail()->status_akun == 0) {
            $users->update(['status_akun'=>1]);
            $message = 'Berhasil Aktifkan';
        } else {
            $users->update(['status_akun'=>0]);
            $message = 'Berhasil Nonaktifkan';
        }
        return redirect('/admin/data-petugas/')->with('message',$message);
    }
}
