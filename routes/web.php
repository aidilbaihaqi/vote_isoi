<?php

use App\Http\Controllers\LogPemilihanController;
use App\Http\Controllers\PemilihController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/data-pemilih', [PemilihController::class, 'index'])->name('pemilih.index');
Route::get('/admin/tambah-data-pemilih', [PemilihController::class, 'create'])->name('pemilih.create');
Route::post('/admin/tambah-data-pemilih', [PemilihController::class, 'store'])->name('pemilih.store');

Route::get('/admin/log-pemilihan', [LogPemilihanController::class, 'index'])->name('logpemilihan.index');