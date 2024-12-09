@extends('layouts.main')
@section('title','Dashboard Admin')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome Admin</h3>
          <h6 class="font-weight-normal mb-0">Anda adalah <span class="text-primary">administrator</span> aplikasi voting ini.</h6>
        </div>
        <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <a class="btn btn-sm btn-outline-primary">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</a>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row text-center g-4 mb-4">
    <div class="col-md-3">
        <div class="card text-center p-4">
            <h5 class="card-title">Prof.Agus Saleh Atmadipoera,DESS</h5>
            <h3 class="vote-count">{{ $count_01 }}</h3>
            <p class="text-muted">Suara</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-4">
            <h5 class="card-title">Prof.DSc Anindya Wirasatriya, MSi. MSc</h5>
            <h3 class="vote-count">{{ $count_02 }}</h3>
            <p class="text-muted">Suara</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-4">
            <h5 class="card-title">Prof.Andi Kurniawan., S,Pi. M.Eng, D.Sc,</h5>
            <h3 class="vote-count">{{ $count_03 }}</h3>
            <p class="text-muted">Suara</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center p-4">
            <h5 class="card-title">Dr.Nani Hendiarti</h5>
            <h3 class="vote-count">{{ $count_04 }}</h3>
            <p class="text-muted">Suara</p>
        </div>
    </div>
</div>
</div>
@endsection