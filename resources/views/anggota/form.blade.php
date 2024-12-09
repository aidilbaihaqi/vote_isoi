@extends('layouts.main')
@section('title', 'Vote Ketua Umum')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Halaman Voting</h3>
          <h6 class="font-weight-normal mb-0">Selamat datang {{ $data_anggota->nama }}. Suara anda sangat berharga untuk pemilihan ini.</h6>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Data Anggota Tercatat</h4>
          <div class="table-responsive">
            <table class="table table-hover display">
              <tr>
                <th>Nomor Anggota</th>
                <td>:</td>
                <td>{{ $data_anggota->no_anggota }}</td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $data_anggota->nama }}</td>
              </tr>
              <tr>
                <th>Asal Komda</th>
                <td>:</td>
                <td>{{ $data_anggota->asal_komda }}</td>
              </tr>
              <tr>
                <th>Status Keaktifan</th>
                <td>:</td>
                <td><a class="btn btn-sm btn-inverse-{{ $data_anggota->status_keaktifan ? 'primary' : 'danger' }}">{{ $data_anggota->status_keaktifan ? 'Aktif' : 'Tidak Aktif' }}</a></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tentukan Pilihanmu!</h3>
          @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
          @endif
    
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
      </div>
    </div>
  </div>
</div>
@endsection
