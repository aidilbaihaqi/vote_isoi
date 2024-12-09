<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemilihController extends Controller
{
    public function index()
    {
        return view('admin.pemilih.index',[
            'pemilih' => User::whereIn('level', ['anggota','dewan'])->get()
        ]);
    }

    public function create()
    {
        return view('admin.pemilih.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_anggota' => 'required|unique:users,no_anggota',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'asal_komda' => 'required|string|max:255',
            'status_keaktifan' => 'required'
        ]);

        User::create([
            'no_anggota' => $request->no_anggota,
            'nama' => $request->nama,
            'email' => $request->email,
            'asal_komda' => $request->asal_komda,
            'status_keaktifan' => $request->status_keaktifan,
            'level' => 'anggota',
        ]);

        return redirect()->route('pemilih.create')->with('success', 'Data pemilih berhasil ditambahkan!');
    }
}
