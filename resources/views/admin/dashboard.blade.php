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
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Order Details</p>
          <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
          <div class="d-flex flex-wrap mb-5">
            <div class="mr-5 mt-3">
              <p class="text-muted">Order value</p>
              <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
            </div>
            <div class="mr-5 mt-3">
              <p class="text-muted">Orders</p>
              <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
            </div>
            <div class="mr-5 mt-3">
              <p class="text-muted">Users</p>
              <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
            </div>
            <div class="mt-3">
              <p class="text-muted">Downloads</p>
              <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
            </div> 
          </div>
          <canvas id="order-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6 stretch-card grid-margin">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">Charts</p>
              <div class="charts-data">
                <div class="mt-3">
                  <p class="mb-0">Data 1</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-inf0" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">5k</p>
                  </div>
                </div>
                <div class="mt-3">
                  <p class="mb-0">Data 2</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">1k</p>
                  </div>
                </div>
                <div class="mt-3">
                  <p class="mb-0">Data 3</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 48%" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">992</p>
                  </div>
                </div>
                <div class="mt-3">
                  <p class="mb-0">Data 4</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="progress progress-md flex-grow-1 mr-4">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="mb-0">687</p>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
          <div class="card data-icon-card-primary">
            <div class="card-body">
              <p class="card-title text-white">Number of Meetings</p>                      
              <div class="row">
                <div class="col-8 text-white">
                  <h3>34040</h3>
                  <p class="text-white font-weight-500 mb-0">The total number of sessions within the date range.It is calculated as the sum . </p>
                </div>
                <div class="col-4 background-icon">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection