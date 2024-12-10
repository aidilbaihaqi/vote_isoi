<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vote Ketua Umum</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
  @yield('head')
</head>
<body>
  <div class="main-panel" style="width: 100%">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h3 class="font-weight-bold">Halaman Voting</h3>
              <h5 class="font-weight-normal mb-0">Selamat datang <span class="text-primary">{{ $data_anggota->nama }}.</span> Suara anda sangat berharga untuk pemilihan ini.</h5>
            </div>
            <div class="col-12 col-xl-4">
              <div class="justify-content-end d-flex">
               <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                <form action="{{ route('anggota.back') }}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-primary">Kembali ke halaman utama</button>
                </form>
               </div>
              </div>
             </div>
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
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
                    <th>Email</th>
                    <td>:</td>
                    <td>{{ $data_anggota->email }}</td>
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
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Tentukan Pilihanmu!</h4>
                  @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
      
                  <form action="{{ route('anggota.vote.process') }}" method="POST">
                      @csrf
                      <div class="row text-center">
                          <!-- Calon 01 -->
                          <div class="col-md-3 col-sm-6 mb-4">
                              <label for="calon01" class="d-block">
                                  <img src="{{ asset('calon/calon01.png') }}" class="img-fluid rounded shadow mb-2" alt="Calon 1">
                                  <input type="radio" name="pilihan" id="calon01" value="1">
                                  <span>Calon 01</span>
                              </label>
                          </div>
                          <!-- Calon 02 -->
                          <div class="col-md-3 col-sm-6 mb-4">
                              <label for="calon02" class="d-block">
                                  <img src="{{ asset('calon/calon02.png') }}" class="img-fluid rounded shadow mb-2" alt="Calon 2">
                                  <input type="radio" name="pilihan" id="calon02" value="2">
                                  <span>Calon 02</span>
                              </label>
                          </div>
                          <!-- Calon 03 -->
                          <div class="col-md-3 col-sm-6 mb-4">
                              <label for="calon03" class="d-block">
                                  <img src="{{ asset('calon/calon03.png') }}" class="img-fluid rounded shadow mb-2" alt="Calon 3">
                                  <input type="radio" name="pilihan" id="calon03" value="3">
                                  <span>Calon 03</span>
                              </label>
                          </div>
                          <!-- Calon 04 -->
                          <div class="col-md-3 col-sm-6 mb-4">
                              <label for="calon04" class="d-block">
                                  <img src="{{ asset('calon/calon04.png') }}" class="img-fluid rounded shadow mb-2" alt="Calon 4">
                                  <input type="radio" name="pilihan" id="calon04" value="4">
                                  <span>Calon 04</span>
                              </label>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-success">Submit Vote</button>
                  </form>
              </div>
          </div>
      </div>
      
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('partials.footer')
    <!-- partial -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->

  @yield('script')
</body>

</html>