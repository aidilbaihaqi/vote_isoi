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
            'status_keaktifan' => 'required',
            'level' => 'required'
        ]);

        User::create([
            'no_anggota' => $request->no_anggota,
            'nama' => $request->nama,
            'email' => $request->email,
            'asal_komda' => $request->asal_komda,
            'status_keaktifan' => $request->status_keaktifan,
            'level' => $request->level,
        ]);

        return redirect()->route('pemilih.index')->with('success', 'Data pemilih berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pemilih = User::findOrFail($id);
        return view('admin.pemilih.edit', compact('pemilih'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_anggota' => 'required',
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'asal_komda' => 'required|string|max:255',
            'status_keaktifan' => 'required',
            'level' => 'required'
        ]);
        
        $pemilih = User::findOrFail($id);

        $pemilih->update([
            'no_anggota' => $request->no_anggota,
            'nama' => $request->nama,
            'email' => $request->email,
            'asal_komda' => $request->asal_komda,
            'status_keaktifan' => $request->status_keaktifan,
            'level' => $request->level,
        ]);

        return redirect()->route('pemilih.index')->with('success', 'Data pemilih berhasil diubah!');
    }

    public function destroy($id)
{
    // Cari data pemilih berdasarkan ID
    $pemilih = User::findOrFail($id);

    // Hapus data pemilih
    $pemilih->delete();

    // Redirect ke halaman utama dengan pesan sukses
    return redirect()->route('pemilih.index')->with('success', 'Data pemilih berhasil dihapus!');
}
}
