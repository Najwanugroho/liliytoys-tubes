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

            <div class="card brown" onclick="toggleFormPengeluaran()">
                <p>Pengeluaran:</p>
                <h3>{{ $pengeluaran }}</h3>
            </div>

            <div class="card green">
                <p>Pendapatan Bersih:</p>
                <h3>Rp. {{ number_format($pendapatanBersih, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div id="formPengeluaran" style="display: none;" class="popup-form">
            <form action="{{ route('karyawan.addPengeluaran') }}" method="POST" style="background:white; padding: 20px; border-radius: 10px; width: 300px; margin: auto;">
                @csrf
                <h3>Tambah Pengeluaran</h3>
                <label>
                    Jenis:
                    <select name="jenis_pengeluaran" id="jenisSelect" onchange="toggleInputLainnya()">
                        <option value="Karcis">Karcis (Rp5.000)</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </label><br><br>

                <div id="lainnyaFields" style="display: none;">
                    <label>
                        Jenis Lainnya:
                        <input type="text" name="jenis_pengeluaran_custom">
                    </label><br><br>

                    <label>
                        Nominal:
                        <input type="number" name="nominal_custom">
                    </label><br><br>
                </div>

                <input type="hidden" name="nominal" value="5000" id="nominalHidden">

                <button type="submit">Tambah</button>
                <button type="button" onclick="closeFormPengeluaran()">Batal</button>
            </form>
        </div>


        <footer class="footer">
            <a href="{{ url('/catatan') }}">
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

        function toggleFormPengeluaran() {
        document.getElementById('formPengeluaran').style.display = 'block';
        }

        function closeFormPengeluaran() {
            document.getElementById('formPengeluaran').style.display = 'none';
        }

        function toggleInputLainnya() {
            const select = document.getElementById('jenisSelect');
            const lainnyaFields = document.getElementById('lainnyaFields');
            const nominalInput = document.getElementById('nominalHidden');

            if (select.value === 'lainnya') {
                lainnyaFields.style.display = 'block';
                nominalInput.name = ""; // disable hidden
            } else {
                lainnyaFields.style.display = 'none';
                nominalInput.name = "nominal";
                nominalInput.value = 5000;
            }
        }
    </script>
</body>
</html>
