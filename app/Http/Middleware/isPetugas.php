<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class isPetugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->level_user == 2 && Auth::user()->status_akun == 1) {
                true;
            }
            elseif (Auth::user()->level_user != 2) {
                return redirect('/');
            }
            elseif (Auth::user()->status_delete == 1 || Auth::user()->status_akun == 0) {
                Auth::logout();
                return redirect('/')->with('log','Silahkan Login Terlebih Dahulu');
            }
        }
        else {
            return redirect('/')->with('log','Silahkan Login Terlebih Dahulu');
        }
        return $next($request);
    }
}
