<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->level == 'admin') {
            return redirect()->route('admin.dashboard'); // Arahkan ke dashboard admin
        }
        $user = Auth::user();
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::check() && Auth::user()->level == 'admin') {
            return redirect()->route('admin.dashboard'); // Arahkan ke dashboard admin
        }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->level == 'admin') {
                return redirect()->route('admin.dashboard')->with(['success','Berhasil login!']);
            }
            return redirect()->route('login.index')->with(['error', 'Anda bukan administrator']);
        }

        return redirect()->route('login.index')->with(['error' => 'Kesalahan login. Pastikan bahwa email dan password benar!']);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out pengguna
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect()->route('login.index')->with('success', 'Anda telah berhasil logout.');
    }

}
