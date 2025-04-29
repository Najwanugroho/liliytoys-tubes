<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan (Admin)</title>
    <link rel="stylesheet" href="css/keuangan-admin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

        <!-- Header -->
        <header class="header">
            <a href="{{ url('/admin-home') }}" class="back-button">
                <img src="{{ asset('images/Back.png') }}" alt="Back">
            </a>
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo">
            <div class="user-info">
                <span>Admin</span>
                <img src="{{ asset('images/User.png') }}" alt="User" class="user-icon">
            </div>
        </header>

        <!-- Search -->
        <div class="search-bar">
            <input type="text" placeholder="Search">
        </div>

        <!-- Filter -->
        <div class="filter">
            <label for="filter-select">Filter:</label>
            <select id="filter-select">
                <option>Harian</option>
                <option selected>Mingguan</option>
                <option>Bulanan</option>
            </select>
        </div>

        <!-- Tabel -->
        <table class="report-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>1.</td><td>User123</td><td>05/05/2025</td><td>07.30 - 15.30</td><td>Rp. 1.000.000</td></tr>
                <tr><td>2.</td><td>User123</td><td>07/05/2025</td><td>07.30 - 15.30</td><td>Rp. 2.000.000</td></tr>
                <tr><td>3.</td><td>User456</td><td>08/05/2025</td><td>07.30 - 15.30</td><td>Rp. 3.000.000</td></tr>
                <tr><td>4.</td><td>User123</td><td>09/05/2025</td><td>07.30 - 15.30</td><td>Rp. 1.000.000</td></tr>
                <tr><td>5.</td><td>User456</td><td>10/05/2025</td><td>07.30 - 15.30</td><td>Rp. 2.000.000</td></tr>
                <tr><td>6.</td><td>User456</td><td>11/05/2025</td><td>07.30 - 15.30</td><td>Rp. 3.000.000</td></tr>
                <tr><td>7.</td><td>User456</td><td>12/05/2025</td><td>07.30 - 15.30</td><td>Rp. 4.000.000</td></tr>
            </tbody>
        </table>

        <!-- Total -->
        <div class="total">
            <strong>Total Pendapatan:</strong> Rp. 16.000.000
        </div>

    </div>
</body>
</html>
