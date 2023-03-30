<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'admin'){
            return $next($request);
        }
        Alert::error('ups', 'Maaf anda bukan admin!');
        return redirect('/home');
    }
}
