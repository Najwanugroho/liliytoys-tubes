<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Inventaris Admin</title>
    <link rel="stylesheet" href="{{ asset('css/invetaris-admin.css') }}">
</head>
<body>

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

<!-- Tab Navigasi Kategori -->
<nav class="category-nav">
    <div class="tabs">
        <button class="active">Skuter</button>
        <button>Mobil</button>
        <button>Motor</button>
        <button>Styrofoam</button>
    </div>
    <button class="add-btn">+</button>
</nav>

<main>
    <!-- Tabel Inventaris -->
    <table class="inventory-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Id</th>
                <th>Jenis</th>
                <th>Stok Awal</th>
                <th>Rusak</th>
                <th>Stok saat ini</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}.</td>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['jenis'] }}</td>
                <td>
                    <div class="controls">
                        <button class="rounded">-</button>
                        <span>{{ $item['stok_awal'] }}</span>
                        <button class="rounded">+</button>
                    </div>
                </td>
                <td>
                    <div class="controls">
                        <button class="rounded">-</button>
                        <span>{{ $item['rusak'] }}</span>
                        <button class="rounded">+</button>
                    </div>
                </td>
                <td>{{ $item['stok_awal'] - $item['rusak'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total -->
    <div class="total">
        <strong>
            Tersedia saat ini:
            {{ $data->sum(fn($item) => $item['stok_awal'] - $item['rusak']) }}
        </strong>
    </div>


</main>

</body>
</html>
