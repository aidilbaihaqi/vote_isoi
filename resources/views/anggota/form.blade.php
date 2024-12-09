@extends('layouts.main')
@section('title', 'Vote Ketua Umum')

@section('content')
<div class="content-wrapper">
  <h2>Form Voting</h2>

  @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <p>Selamat datang, {{ $data_anggota->nama }} (No. Anggota: {{ $data_anggota->no_anggota }})</p>

  <form action="{{ route('anggota.vote.process') }}" method="POST">
      @csrf
      <div class="mb-3">
          <label for="pilihan" class="form-label">Pilih Calon</label>
          <select name="pilihan" class="form-select" required>
              <option value="">-- Pilih Calon --</option>
              <option value=1>Calon 01</option>
              <option value=2>Calon 02</option>
              <option value=3>Calon 03</option>
              <option value=4>Calon 04</option>
          </select>
      </div>
      <button type="submit" class="btn btn-success">Submit Vote</button>
  </form>
</div>
@endsection
