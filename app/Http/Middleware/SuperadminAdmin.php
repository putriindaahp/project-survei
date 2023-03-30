<?php

namespace App\Http\Middleware;

use Alert;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')) {
            return $next($request);
        }
        Alert::error('ups', 'Maaf anda tidak punya akses!');
        return redirect('/home');
    }
}
