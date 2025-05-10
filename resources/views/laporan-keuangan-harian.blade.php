<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Keuangan Harian</title>
  <link rel="stylesheet" href="{{ asset('css/keuangan-harian.css') }}">
</head>
<body>

    <header class="top-bar">
        <div class="left-section">
          <a href="{{ url('/karyawan-home') }}" class="back-button">
            <img src="{{ asset('images/Back.png') }}" alt="Back">
          </a>
        </div>
        <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo" >
        <div class="user-section">
            <p class="tanggal">Tanggal: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
          <span class="username">{{ $user }}</span>
          <img src="{{ asset('images/User.png') }}" alt="User" class="user-icon">
        </div>
      </header>

      <div class="search-bar">
        <input type="text" placeholder="Search">
      </div>

      <div class="filter-wrapper">
        <button class="filter-btn">&#x1F5D2;</button>
        <div class="filter-dropdown">
          <ul>
            <li>Waktu</li>
            <li>Nama Permainan</li>
          </ul>
        </div>
      </div>



  <main>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Permainan</th>
          <th>Waktu</th>
          <th>Harga</th>
          <th>Status Pembayaran</th>
          <th>Ket.</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $index => $item)
        <tr>
          <td>{{ $index + 1 }}.</td>
          <td>
            <select name="nama_permainan" class="dropdown-permainan">
              <option value="Skuter" {{ $item['nama'] == 'Skuter' ? 'selected' : '' }}>✓ Skuter</option>
              <option value="Mobil" {{ $item['nama'] == 'Mobil' ? 'selected' : '' }}>✓ Mobil</option>
              <option value="Motor" {{ $item['nama'] == 'Motor' ? 'selected' : '' }}>✓ Motor</option>
              <option value="Styrofoam" {{ $item['nama'] == 'Styrofoam' ? 'selected' : '' }}>✓ Styrofoam</option>
            </select>
          </td>
          <td>{{ $item['waktu'] }}</td>
          <td>{{ $item['harga'] }}</td>
          <td>
            <select
            name="status_pembayaran"
            class="dropdown-status {{ strtolower($item['status']) }}"
            onchange="updateSelectStyle(this, {{ $item['id'] }})"
          >
            <option value="Lunas" {{ $item['status'] == 'Lunas' ? 'selected' : '' }}>Lunas</option>

          </select>

          </td>
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="income-box">
      Pendapatan:<br>Rp {{ number_format($pendapatan, 0, ',', '.') }}
    </div>
    <script>
        function updateSelectStyle(select, id) {
          const value = select.value.toLowerCase();

          // Hapus class sebelumnya
          select.classList.remove('lunas', 'belum');
          select.classList.add(value);

          // Optional: kirim update ke server
          fetch("{{ route('catatan.updateStatus') }}", {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id, status: select.value })
          }).then(res => res.json())
            .then(data => console.log(data))
            .catch(err => console.error(err));
        }

        // Untuk set class saat halaman pertama kali load
        document.querySelectorAll('.dropdown-status').forEach(select => {
          updateSelectStyle(select, select.dataset.id || 0);
        });
      </script>

  </main>
</body>
</html>
