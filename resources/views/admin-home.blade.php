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
            <p><em>Selamat Datang Admin</em></p>
        </div>

        <section class="employee-section">
            <h2>Karyawan:</h2>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search" onkeyup="searchEmployee()">
            </div>
            <a href="{{ url('/register-karyawan') }}">
                <button class="add-employee">+ Add Employee</button>
            </a>
            <ul class="employee-list">
                @forelse ($karyawans as $karyawan)
                    <li>
                        <a href="{{ url('/detail-karyawan/' . $karyawan->id) }}">
                            {{ $karyawan->username }}
                        </a>
                        <i class="fas fa-ellipsis-v"></i>
                    </li>
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
                <button>
                    <img src="{{ asset('images/Box.png') }}" alt="Box">
                </button>
            </a>
        </nav>
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

        function searchEmployee() {
        // Ambil input dan daftar karyawan
        let input = document.getElementById('searchInput').value.toLowerCase();
        let employeeList = document.querySelectorAll('.employee-list li');
        
        // Loop untuk mengecek setiap item dalam daftar karyawan
        employeeList.forEach(function(item) {
            let employeeName = item.textContent || item.innerText;
            if (employeeName.toLowerCase().indexOf(input) > -1) {
                item.style.display = ""; // tampilkan jika cocok
            } else {
                item.style.display = "none"; // sembunyikan jika tidak cocok
            }
        });
    }
    </script>
</body>
</html>
