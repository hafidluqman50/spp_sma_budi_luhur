<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login';
        return view('login',compact('title'));
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data_login = ['username' => $username, 'password' => $password,'status_delete' => 0];
        
        if (Auth::attempt($data_login,true)) {
            if (Auth::user()->level_user == 3) {
                return redirect('/admin/dashboard');
            }
            else if(Auth::user()->level_user == 2) {
                return redirect('/petugas/dashboard');
            }
            else if(Auth::user()->level_user == 1) {
                return redirect('/kepsek/dashboard');
            }
            else if(Auth::user()->level_user == 0) {
                return redirect('/ortu/dashboard');
            }
            else if(Auth::user()->status_akun == 0) {
                return redirect('/')->with('log','Akun Non Aktif');
            }
        }
        else {
            return redirect('/')->with('log','Akun Tidak Ada');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // public function 
}
