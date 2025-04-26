<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page Karyawan</title>
    <link rel="stylesheet" href="{{ asset('css/karyawan.css') }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="{{ asset('images/Logo.png') }}" alt="Home" class="img-fluid rounded">
            <div class="user-icon"><img src="{{ asset('images/User.png') }}" alt="Tambah"></div>
        </header>

        <div class="welcome-banner">
            <h2>Selamat Datang <strong>{{ $username }}</strong></h2>
        </div>

        <div class="stats">
            <div class="card blue">
                <p>Pendapatan:</p>
                <h3>Rp. {{ number_format($pendapatan, 0, ',', '.') }}</h3>
            </div>
            <div class="card brown">
                <p>Pengeluaran:</p>
                <h3>{{ $pengeluaran }}</h3>
            </div>
            <div class="card green">
                <p>Pendapatan Bersih:</p>
                <h3>Rp. {{ number_format($pendapatanBersih, 0, ',', '.') }}</h3>
            </div>
        </div>

        <footer class="footer">
            <button><img src="{{ asset('images/Tambah.png') }}" alt="Tambah"></button>
            <button><img src="{{ asset('images/Catatan.png') }}" alt="Catatan"></button>
            <a href="{{ url('/inventaris-admin') }}">
                <button><img src="{{ asset('images/Box.png') }}" alt="Box"></button>
            </a>
        </footer>
    </div>
</body>
</html>
