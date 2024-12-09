<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Ketua Umum ISOI</title>
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
<body>

    <div class="container my-5">
        <!-- Title Section -->
        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold text-dark">Voting Ketua Umum ISOI</h1>
        </div>

        <!-- Poster Section -->
        <div class="text-center mb-5">
            <img src="{{ asset('poster.jpg') }}" class="img-fluid rounded shadow" alt="Poster Voting" style="max-width: 600px;">
        </div>

        <div class="row text-center g-4 mb-4">
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <h5 class="card-title">Kandidat</h5>
                    <p class="vote-count">12</p>
                    <p class="text-muted">Suara</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <h5 class="card-title">Kandidat</h5>
                    <p class="vote-count">12</p>
                    <p class="text-muted">Suara</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <h5 class="card-title">Kandidat</h5>
                    <p class="vote-count">12</p>
                    <p class="text-muted">Suara</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-4">
                    <h5 class="card-title">Kandidat</h5>
                    <p class="vote-count">12</p>
                    <p class="text-muted">Suara</p>
                </div>
            </div>
        </div>

        <!-- Total Votes Section -->
        <div class="text-center">
            <h4 class="text-dark">Total Suara Terhitung: <span class="badge bg-primary fs-4">345</span></h4>
        </div>

        {{-- <!-- Voting Results Section -->
        <div class="mb-5">
            <h2 class="text-center mb-3">Hasil Sementara</h2>
            <div class="d-flex justify-content-center">
                <canvas id="voteChart" width="200" height="100"></canvas>
            </div>
        </div> --}}

        <!-- Form Role Selection -->
        <div class="mb-5 text-center text-dark">
            <h5>Pilih pemimpin masa depan dengan suara Anda!</h5>
            <p>Pemilihan dibedakan menjadi dua yaitu Anggota dan Dewan Kehormatan</p>
            <div class="btn-group mt-3" role="group">
                <button type="button" class="btn btn-primary" onclick="showForm('anggota')">Anggota</button>
                <button type="button" class="btn btn-secondary" onclick="showForm('dewan')">Dewan Kehormatan</button>
            </div>
        </div>

        <!-- Form Validasi Anggota -->
        <div id="form-anggota" class="d-none">
            <div class="card p-4 shadow mb-4 mx-auto" style="width: 50%">
                <h5 class="mb-3">Validasi Anggota</h5>
                <form action="" method="POST">
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
            <div class="card p-4 shadow mb-4 mx-auto" style="width: 50%">
                <h5 class="mb-3">Validasi Dewan Kehormatan</h5>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>

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

    {{-- <!-- Chart Configuration -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('voteChart').getContext('2d');
            const voteChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['udin','rani','asep','ferdi'], // Array nama kandidat dari controller
                    datasets: [{
                        label: 'Jumlah Suara',
                        data: [12,32,23,45], // Array jumlah suara dari controller
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script> --}}
</body>
</html>
