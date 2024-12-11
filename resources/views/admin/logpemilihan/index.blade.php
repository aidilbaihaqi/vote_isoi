@extends('layouts.main')
@section('title','Data Riwayat Pemilihan')

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
            <h3 class="font-weight-bold">Data Riwayat Pemilihan</h3>
            <h6 class="font-weight-normal mb-0">Berikut data-data riwayat pemilihan.</h6>
          </div>
          <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
             <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
               <form action="{{ route('clearData') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary" onclick="confirm('Apakah anda yakin ingin menghapus seluruh data log pemilihan?')">Clear Data</button>
               </form>
             </div>
            </div>
           </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Riwayat Pemilihan</h4>
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
          <table id="dataRiwayatPemilihan" class="table table-hover display">
            <thead>
              <tr>
                <th>#</th>
                <th>No Anggota</th>
                <th>Pilihan</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Voted At</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $p)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td><a href="{{ route('pemilih.index') }}">{{ $p->user->no_anggota }}</a></td>
                  <td>{{ $p->pilihan }}</td>
                  <td>{{ $p->ip_address }}</td>
                  <td>{{ $p->user_agent }}</td>
                  <td>{{ $p->created_at }}</td>
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
    $('#dataRiwayatPemilihan').DataTable({
        dom: 'lfrtip', // Atur elemen DataTables
    });
});

</script>
@endsection