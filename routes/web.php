<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LogPemilihanController;
use App\Http\Controllers\PemilihController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/validate-anggota', [LandingController::class, 'validatedAnggota'])->name('validate.anggota');
Route::post('/validate-dewan', [LandingController::class, 'validatedDewan'])->name('validate.dewan');

// Form Vote
Route::get('/pemilih/vote', [LandingController::class, 'formAnggota'])->name('anggota.vote')->middleware('canVote');
Route::post('/pemilih/vote', [LandingController::class, 'anggotaVote'])->name('anggota.vote.process')->middleware('canVote');
Route::post('/pemilih/vote/backToLanding', [LandingController::class, 'backToLanding'])->name('anggota.back');

// Login Admin
Route::get('/admin/login', [AuthController::class, 'index'])->name('login.index');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login');

// Admin CRUD
Route::middleware('checkLogin')->group(function() {
  Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::post('/admin/toggle-voting', [DashboardController::class, 'toggleVoting'])->name('admin.toggleVoting');

  Route::get('/admin/data-pemilih', [PemilihController::class, 'index'])->name('pemilih.index');
  Route::get('/admin/data-pemilih/tambah-data-pemilih', [PemilihController::class, 'create'])->name('pemilih.create');
  Route::post('/admin/data-pemilih/tambah-data-pemilih', [PemilihController::class, 'store'])->name('pemilih.store');
  Route::get('/admin/data-pemilih/{id}/ubah-data-pemilih', [PemilihController::class, 'edit'])->name('pemilih.edit');
  Route::put('/admin/data-pemilih/{id}', [PemilihController::class, 'update'])->name('pemilih.update');
  Route::get('/admin/data-pemilih/{id}', [PemilihController::class, 'destroy'])->name('pemilih.destroy');
  
  Route::get('/admin/log-pemilihan', [LogPemilihanController::class, 'index'])->name('logpemilihan.index');
});
