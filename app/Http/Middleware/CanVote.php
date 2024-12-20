<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanVote
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Setting::first()->voting_status) {
            return redirect()->route('landing')->with(['error' => 'Voting sedang ditutup. Anda tidak bisa melakukan voting lagi!']);
        }

        if(!Session::has('validated_anggota')) {
            return redirect()->route('landing')->with(['error' => 'Anda harus memvalidasi nomor anggota atau email terlebih dahulu.']);
        }

        return $next($request);
    }
}
