<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kepsek;
use Illuminate\Support\Str;

class KepsekController extends Controller
{
    public function index()
    {
        $title = 'Data Kepsek | Admin';

        return view('Admin.kepsek.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Tambah Kepsek | Admin';

        return view('Admin.kepsek.kepsek-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nip_kepsek  = $request->nip_kepsek;
        $nama_kepsek = $request->nama_kepsek;
        $username    = $request->username;
        $password    = $request->password;
        $id_users    = (string)Str::uuid();

        if (User::where('username',$username)->count()>1) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'id_users'      => $id_users,
            'name'          => $nama_kepsek,
            'username'      => $username,
            'password'      => bcrypt($password),
            'level_user'    => 1,
            'status_akun'   => 1,
            'status_delete' => 0
        ];

        User::create($data_user);

        $data_kepsek = [
            'nip_kepsek'    => $nip_kepsek,
            'nama_kepsek'   => $nama_kepsek,
            'id_users'      => $id_users,
            'status_delete' => 0
        ];

        Kepsek::create($data_kepsek);

        return redirect('/admin/data-kepsek')->with('message','Berhasil Input Kepsek');
    }

    public function edit($id)
    {
        $title = 'Edit Kepsek | Admin';
        $row   = Kepsek::join('users','kepsek.id_users','=','users.id_users')->where('id_kepsek',$id)->firstOrFail();

        return view('Admin.kepsek.kepsek-edit',compact('title','row','id'));
    }

    public function update(Request $request, $id)
    {   
        $nip_kepsek     = $request->nip_kepsek;
        $nama_kepsek    = $request->nama_kepsek;
        $username       = $request->username;
        $password       = $request->password;
        $jabatan_kepsek = $request->jabatan_kepsek;

        if (User::where('username',$username)->count()>1) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'name'          => $nama_kepsek,
            'username'      => $username,
            'password'      => bcrypt($password)
        ];

        $data_kepsek = [
            'nip_kepsek'     => $nip_kepsek,
            'nama_kepsek'    => $nama_kepsek
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

        $get_id_user = Kepsek::where('id_kepsek',$id)->firstOrFail()->id_users;

        User::where('id_users',$get_id_user)->update($data_user);
        Kepsek::where('id_kepsek',$id)->update($data_kepsek);

        return redirect('/admin/data-kepsek')->with('message','Berhasil Update Kepsek');
    }

    public function delete($id)
    {
        $get = Kepsek::where('id_kepsek',$id);
        // $foto = $get->firstOrFail()->foto_profile;
        User::where('id_users',$get->firstOrFail()->id_users)->update(['status_delete'=>1]);
        $get->update(['status_delete' => 1]);


        return redirect('/admin/data-kepsek');
    }

    public function statusKepsek($id) 
    {
        $kepsek = Kepsek::where('id_kepsek',$id)->firstOrFail();
        $users   = User::where('id_users',$kepsek->id_users);
        if ($users->firstOrFail()->status_akun == 0) {
            $users->update(['status_akun'=>1]);
            $message = 'Berhasil Aktifkan';
        } else {
            $users->update(['status_akun'=>0]);
            $message = 'Berhasil Nonaktifkan';
        }
        return redirect('/admin/data-kepsek/')->with('message',$message);
    }
}
