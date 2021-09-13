<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class isLogin
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
            if (Auth::user()->level_user == 2) {
                return redirect('/admin/dashboard');
            }
            elseif (Auth::user()->level_user == 1) {
                return redirect('/petugas/dashboard');
            }
            elseif (Auth::user()->level_user == 0) {
                return redirect('/ortu/dashboard');
            }
        }
        return $next($request);
    }
}
