@extends('layouts.main')
@section('title','Edit Data Pemilih')

@section('content')
<div class="container my-5">
  <h2 class="mb-4">Edit Data Pemilih</h2>

  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  <form action="{{ route('pemilih.update', $pemilih->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
          <label for="no_anggota" class="form-label">Nomor Anggota</label>
          <input type="text" name="no_anggota" class="form-control @error('no_anggota') is-invalid @enderror" value="{{ $pemilih->no_anggota }}" required>
          @error('no_anggota')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $pemilih->nama }}" required>
          @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $pemilih->email }}" required>
          @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3" style="width: 50%">
        <label for="asal_komda">Pilih Asal Komda:</label>
        <select id="asal_komda" name="asal_komda" class="form-control @error('asal_komda') is-invalid @enderror">
          <option value="" disabled>-- Pilih Asal Komda --</option>
          @foreach(['DKI Jakarta', 'Pekanbaru', 'Manado', 'Makassar', 'Bogor', 'Bandung', 'Yogyakarta', 'Surabaya', 'Ambon', 'Denpasar', 'Semarang', 'Serang', 'Malang', 'Mataram', 'Lampung', 'Palembang', 'Banda Aceh', 'Samarinda', 'Bangka Belitung', 'Luar Negeri', 'Banjarmasin', 'Kendari', 'Tanjungpinang', 'Manokwari', 'Kupang', 'Bengkulu'] as $komda)
              <option value="{{ $komda }}" {{ $pemilih->asal_komda == $komda ? 'selected' : '' }}>{{ $komda }}</option>
          @endforeach
      </select>

        @error('asal_komda')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3" style="width: 40%">
          <label for="status_keaktifan" class="form-label">Status Keaktifan</label>
          <select name="status_keaktifan" class="form-control @error('status_keaktifan') is-invalid @enderror" required>
              <option value=1 {{ $pemilih->status_keaktifan == 1 ? 'selected' : '' }}>Aktif</option>
              <option value=0 {{ $pemilih->status_keaktifan == 0 ? 'selected' : '' }}>Tidak Aktif</option>
          </select>
          @error('status_keaktifan')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <button type="submit" class="btn btn-primary">Edit Pemilih</button>
  </form>
</div>
@endsection