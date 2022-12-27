<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        $title = 'Data Users';

        return view('Admin.data-users.main',compact('title'));
    }

    public function tambah()
    {
        $title = 'Form Data Users';

        return view('Admin.data-users.data-users-tambah',compact('title'));
    }

    public function save(Request $request)
    {
        $nama_users  = $request->nama_users;
        $username    = $request->username;
        $password    = $request->password;
        $jenis_users = $request->jenis_users;
        $id_users    = (string)Str::uuid();

        if (User::where('username',$username)->count()>1) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'id_users'      => $id_users,
            'name'          => $nama_users,
            'username'      => $username,
            'password'      => bcrypt($password),
            'level_user'    => $jenis_users,
            'status_akun'   => 1,
            'status_delete' => 0
        ];

        User::create($data_user);

        return redirect('/admin/data-users')->with('message','Berhasil Input Data');
    }

    public function edit($id)
    {
        $title = 'Form Data Users';
        $row   = User::where('id_users',$id)->firstOrFail();

        return view('Admin.data-users.data-users-edit',compact('title','row'));
    }

    public function update(Request $request, $id)
    {
        $nama_users  = $request->nama_users;
        $username    = $request->username;
        $password    = $request->password;
        $jenis_users = $request->jenis_users;

        if (User::where('username',$username)->count()>1) {
            return redirect()->back()->withErrors(['log'=>'Username Sudah Ada'])->withInput();
        }

        $data_user = [
            'name'          => $nama_users,
            'username'      => $username,
            'password'      => bcrypt($password)
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

        User::where('id_users',$id)->update($data_user);

        return redirect('/admin/data-users')->with('message','Berhasil Update User');
    }

    public function delete($id)
    {
        // $get = Petugas::where('id_petugas',$id);
        // $foto = $get->firstOrFail()->foto_profile;
        User::where('id_users',$id)->update(['status_delete'=>1]);


        return redirect('/admin/data-users')->with('message','Berhasil Delete Users');
    }

    public function statusPetugas($id) 
    {
        $users   = User::where('id_users',$id);
        if ($users->firstOrFail()->status_akun == 0) {
            $users->update(['status_akun'=>1]);
            $message = 'Berhasil Aktifkan';
        } else {
            $users->update(['status_akun'=>0]);
            $message = 'Berhasil Nonaktifkan';
        }
        return redirect('/admin/data-users/')->with('message',$message);
    }
}
