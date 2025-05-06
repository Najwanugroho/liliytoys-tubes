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
            <div class="user-menu">
                <button onclick="toggleDropdown()" class="user-icon">
                    <img src="{{ asset('images/User.png') }}" alt="Profile">
                </button>
                <div id="dropdown" class="dropdown-menu hidden">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); logoutAndRedirect();">
                        Logout
                    </a>
                    <script>
                        function logoutAndRedirect() {
                            // Logout
                            document.getElementById('logout-form').submit();

                            // Redirect setelah logout
                            window.location.href = "{{ url('landing') }}";
                        }
                    </script>



                </div>
            </div>
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
            <a href="{{ url('#') }}">
            <button><img src="{{ asset('images/Tambah.png') }}" alt="Tambah"></button>
            </a>
            <a href="{{ url('/laporan-keuangan-harian') }}">
            <button><img src="{{ asset('images/Catatan.png') }}" alt="Catatan"></button>
            <a href="{{ url('/inventaris-admin') }}">
                <button><img src="{{ asset('images/Box.png') }}" alt="Box"></button>
            </a>

        </footer>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function (e) {
            const button = document.querySelector('.user-icon');
            const dropdown = document.getElementById('dropdown');
            if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
