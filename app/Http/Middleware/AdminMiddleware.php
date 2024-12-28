<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan memiliki ID 1
        if (Auth::check() && Auth::id() == 1) {
            return $next($request); // Lanjutkan ke permintaan berikutnya
        }

        // Jika bukan admin, redirect ke halaman lain (misalnya home)
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
