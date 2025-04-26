<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="{{ asset('images/Logo.png') }}" alt="Home" class="img-fluid rounded">
            <div class="user-icon"><img src="{{ asset('images/User.png') }}" alt="Tambah"></div>
        </header>

        <div class="welcome-banner">
            <p><em>Selamat Datang Admin</em></p>
        </div>

        <section class="employee-section">
            <h2>Karyawan:</h2>
            <a href="{{ url('/register-karyawan') }}">
            <button class="add-employee">+ Add Employee</button>
            </a>
            <ul class="employee-list">
                @forelse ($karyawans as $karyawan)
                    <li>{{ $karyawan->username }} <i class="fas fa-ellipsis-v"></i></li>
                @empty
                    <li>Belum ada karyawan.</li>
                @endforelse
            </ul>
        </section>

        <nav class="footer">
            <a href="{{ url('/keuangan-admin') }}">
                <button>
                    <img src="{{ asset('images/Catatan.png') }}" alt="Catatan">
                </button>
            </a>
            <a href="{{ url('/inventaris-admin') }}">
            <button><img src="{{ asset('images/Box.png') }}" alt="Box"></button>
            </a>
        </nav>
    </div>
</body>
</html>
