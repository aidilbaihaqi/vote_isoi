<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LogPemilihanController;
use App\Http\Controllers\PemilihController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/', [LandingController::class, 'validatedAnggota'])->name('validate.anggota');

Route::get('/anggota/vote', [LandingController::class, 'formAnggota'])->name('anggota.vote')->middleware('canVote');
Route::post('/anggota/vote', [LandingController::class, 'anggotaVote'])->name('anggota.vote.process')->middleware('canVote');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/data-pemilih', [PemilihController::class, 'index'])->name('pemilih.index');
Route::get('/admin/data-pemilih/tambah-data-pemilih', [PemilihController::class, 'create'])->name('pemilih.create');
Route::post('/admin/data-pemilih/tambah-data-pemilih', [PemilihController::class, 'store'])->name('pemilih.store');
Route::get('/admin/data-pemilih/{id}/ubah-data-pemilih', [PemilihController::class, 'edit'])->name('pemilih.edit');
Route::put('/admin/data-pemilih/{id}', [PemilihController::class, 'update'])->name('pemilih.update');
Route::get('/admin/data-pemilih/{id}', [PemilihController::class, 'destroy'])->name('pemilih.destroy');

Route::get('/admin/log-pemilihan', [LogPemilihanController::class, 'index'])->name('logpemilihan.index');