<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LogPemilihanController;
use App\Http\Controllers\PemilihController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/data-pemilih', [PemilihController::class, 'index'])->name('pemilih.index');
Route::get('/admin/tambah-data-pemilih', [PemilihController::class, 'create'])->name('pemilih.create');
Route::post('/admin/tambah-data-pemilih', [PemilihController::class, 'store'])->name('pemilih.store');

Route::get('/admin/log-pemilihan', [LogPemilihanController::class, 'index'])->name('logpemilihan.index');