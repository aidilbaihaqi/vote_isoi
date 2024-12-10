<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Ketua Umum ISOI</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v=2" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset("background.jpeg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #fff; /* Warna teks agar kontras dengan background */
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6); /* Overlay gelap untuk meningkatkan keterbacaan */
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            background: rgba(255, 255, 255, 0.9); /* Latar belakang putih semi-transparan */
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            max-width: 800px;
        }

        .form-container {
            width: 50%;
            margin: 0 auto;
        }
    </style>
    
</head>
<body class="container-fluid">

    <div class="container mt-5">

        @php
            $votingstatus = \App\Models\Setting::first()->voting_status;
        @endphp

        @if ($votingstatus)
            <!-- Form Role Selection -->
            <div class="mb-5 text-center text-dark">
                <h2 class="">Voting telah dibuka!</h2>
                <p class="text-muted">Pemilihan dibedakan menjadi dua yaitu Anggota dan Dewan Kehormatan</p>
                <div class="btn-group mt-3" role="group">
                    <button type="button" class="btn btn-primary" onclick="showForm('anggota')">Anggota</button>
                    <button type="button" class="btn btn-secondary" onclick="showForm('dewan')">Dewan Kehormatan</button>
                </div>
            </div>

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Form Validasi Anggota -->
            <div id="form-anggota" class="d-none">
                <div class="card p-4 shadow mb-4 mx-auto" style="max-width: 600px; width: 100%;">
                    <h5 class="mb-3 text-center">Validasi Anggota</h5>
                    <form action="{{ route('validate.anggota') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="no_anggota" class="form-label">Nomor Anggota</label>
                            <input type="text" class="form-control" id="no_anggota" name="no_anggota" required>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Form Validasi Dewan Kehormatan -->
            <div id="form-dewan" class="d-none">
                    <div class="card p-4 shadow mb-4 mx-auto" style="max-width: 600px; width: 100%;">
                        <h5 class="mb-3 text-center">Validasi Dewan Kehormatan</h5>
                        <form action="{{ route('validate.dewan') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        @else

        <div class="text-center text-dark">
            <h2>Voting Ditutup</h2>
            <p>Voting belum dibuka atau sudah ditutup oleh admin.</p>

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        @endif

    </div>

    <div class="container mb-5 mt-3">
        <!-- Title Section -->
        <div class="text-center mb-4">
            <h1 class="display-6 text-dark">Voting Ketua Umum ISOI</h1>
        </div>

        <!-- Poster Section -->
        <div class="text-center mb-5">
            <img src="{{ asset('poster.jpg') }}" class="img-fluid rounded shadow" alt="Poster Voting">
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

        <div class="text-center">
            <h3 class="text-center">Hasil Voting</h3>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <canvas id="barchart" class="w-100"></canvas>
                    </div>
                </div>
        </div>

        <!-- Total Votes Section -->
        <div class="text-center">
            <h4 class="text-dark">Total Suara Terhitung: <span class="badge bg-primary fs-5">{{ $all_count }}</span></h4>
        </div>

        {{-- <!-- Voting Results Section -->
        <div class="mb-5">
            <h2 class="text-center mb-3">Hasil Sementara</h2>
            <div class="d-flex justify-content-center">
                <canvas id="voteChart" width="200" height="100"></canvas>
            </div>
        </div> --}}

        

    <!-- Bootstrap JS and Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JavaScript untuk Menampilkan Form -->
    <script>
        function showForm(role) {
            const formAnggota = document.getElementById('form-anggota');
            const formDewan = document.getElementById('form-dewan');

            if (role === 'anggota') {
                formAnggota.classList.remove('d-none');
                formDewan.classList.add('d-none');
            } else if (role === 'dewan') {
                formDewan.classList.remove('d-none');
                formAnggota.classList.add('d-none');
            }
        }
    </script>

    {{-- BarChart --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Data calon dan jumlah terpilih
            const calon = ['Calon 1', 'Calon 2', 'Calon 3', 'Calon 4']; // Nama calon
            const jumlahTerpilih = [{{ $count_01.','.$count_02.','.$count_03.','.$count_04 }}]; // Jumlah yang terpilih
    
            // Referensi canvas
            const ctx = document.getElementById('barchart').getContext('2d');
    
            // Membuat barchart
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: calon,
                    datasets: [{
                        label: 'Jumlah Terpilih (Bar)',
                        data: jumlahTerpilih,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)', // Warna untuk Calon 1
                            'rgba(54, 162, 235, 0.7)', // Warna untuk Calon 2
                            'rgba(255, 206, 86, 0.7)', // Warna untuk Calon 3
                            'rgba(75, 192, 192, 0.7)'  // Warna untuk Calon 4
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Terpilih',
                                font: {
                                    size: 14
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Calon',
                                font: {
                                    size: 14
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
    
</body>
</html>
