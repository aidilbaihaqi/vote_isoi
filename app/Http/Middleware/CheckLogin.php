<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level === 'admin') {
                return $next($request);
            }
        }

        // Jika user tidak login atau bukan admin, arahkan ke halaman login atau halaman lainnya
        return redirect()->route('login')->with('error', 'Anda harus login sebagai admin untuk mengakses halaman ini.');
    }
}
