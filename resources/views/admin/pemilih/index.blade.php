@extends('layouts.main')
@section('title','Data Pemilih')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- CSS DataTables untuk Bootstrap -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Data Pemilih</h3>
            <h6 class="font-weight-normal mb-0">Berikut data-data pemilih yang tercatat di pusat.</h6>
          </div>
          <div class="col-12 col-xl-4">
           <div class="justify-content-end d-flex">
            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
              <a class="btn btn-sm btn-primary" href="{{ route('pemilih.create') }}">Tambah Data Pemilih</a>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Pemilih</h4>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="table-responsive">
          <table id="dataPemilih" class="table table-hover display">
            <thead>
              <tr>
                <th>#</th>
                <th>No Anggota</th>
                <th>Nama</th>
                <th>Asal Komda</th>
                <th>Status</th>
                <th>Keanggotaan</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pemilih as $p)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->no_anggota }}</td>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->asal_komda }}</td>
                  <td><a class="btn btn-sm btn-{{ $p->status_keaktifan ? 'primary' : 'danger' }}">{{ $p->status_keaktifan ? 'aktif' : 'tidak aktif' }}</a></td>
                  <td>
                    @if ($p->level == 'anggota')
                        Anggota
                    @elseif($p->level == 'dewan')
                        Dewan Kehormatan
                    @endif
                  </td>
                  <td>{{ $p->email }}</td>
                  <td>
                    <a class="btn btn-sm btn-inverse-primary" href="{{ route('pemilih.edit', $p->id) }}">Edit</a>
                    <a class="btn btn-sm btn-inverse-danger" href="{{ route('pemilih.destroy', $p->id) }}">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- JS DataTables untuk Bootstrap -->
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#dataPemilih').DataTable({
        dom: 'lfrtip', // Atur elemen DataTables
    });
});

</script>
@endsection