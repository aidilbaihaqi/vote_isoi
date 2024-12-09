@extends('layouts.main')
@section('title','Tambah Data Pemilih')

@section('content')
<div class="container my-5">
  <h2 class="mb-4">Tambah Data Pemilih</h2>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <form action="{{ route('pemilih.store') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="no_anggota" class="form-label">Nomor Anggota</label>
          <input type="text" name="no_anggota" class="form-control @error('no_anggota') is-invalid @enderror" required>
          @error('no_anggota')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required>
          @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
          <label for="asal_komda" class="form-label">Asal Komda</label>
          <input type="text" name="asal_komda" class="form-control @error('asal_komda') is-invalid @enderror" required>
          @error('asal_komda')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
          <label for="status_keaktifan" class="form-label">Status Keaktifan</label>
          <select name="status_keaktifan" class="form-select @error('status_keaktifan') is-invalid @enderror" required>
              <option value="">-- Pilih Status --</option>
              <option value=1>Aktif</option>
              <option value=0>Tidak Aktif</option>
          </select>
          @error('status_keaktifan')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <button type="submit" class="btn btn-primary">Tambah Pemilih</button>
  </form>
</div>
@endsection