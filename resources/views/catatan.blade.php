<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="{{ asset('css/catatan.css') }}">
  <title>Daftar Permainan</title>
</head>
<body>
  <div class="container">
    <header class="header">
        <div class="header-left">
          <a href="{{ url('/karyawan-home') }}" class="back-button">
            <img src="{{ asset('images/Back.png') }}" alt="Back">
          </a>
        </div>
        <div class="header-center">
          <input type="text" placeholder="Search nama customer..." class="search-bar"/>
        </div>
        <div class="header-right user-panel">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo">
            <p class="tanggal">Tanggal: <a href="#">05/05/2025</a></p>

            <div class="user-profile">
              <img src="{{ asset('images/User.png') }}" alt="User" class="user-icon">
              <span class="username">Karyawan</span>
            </div>

            <div class="button-group">
              <button>Done</button>
              <button>+ Add Customer</button>
            </div>
          </div>

      </header>


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
            @foreach ($catatan as $index => $item)

          <tr class="{{ isset($item['waktu_habis']) && $item['waktu_habis'] ? 'expired' : '' }}">
            <td>{{ $index + 1 }}.</td>

            {{-- Dropdown Permainan --}}
            <td>
              <select name="nama_permainan" class="dropdown-permainan">
                <option value="Skuter" {{ $item['nama'] == 'Skuter' ? 'selected' : '' }}>✓ Skuter</option>
                <option value="Mobil" {{ $item['nama'] == 'Mobil' ? 'selected' : '' }}>✓ Mobil</option>
                <option value="Motor" {{ $item['nama'] == 'Motor' ? 'selected' : '' }}>✓ Motor</option>
                <option value="Styrofoam" {{ $item['nama'] == 'Styrofoam' ? 'selected' : '' }}>✓ Styrofoam</option>
              </select>
            </td>

            {{-- Waktu + countdown atau label habis --}}
            <td>
              {{ $item['waktu'] }}
              @if(isset($item['waktu_habis']) && $item['waktu_habis'])
                <br><small>Waktu habis</small>
              @elseif(isset($item['sisa_waktu']))
                <br><small>{{ $item['sisa_waktu'] }}</small>
              @endif
            </td>

            <td>{{ number_format($item['harga'], 0, ',', '.') }}</td>

            {{-- Dropdown Status --}}
            <td>
              <select
                name="status_pembayaran"
                class="dropdown-status {{ strtolower($item['status']) }}"
                onchange="updateSelectStyle(this, {{ $item['id'] }})"
              >
                <option value="Lunas" {{ $item['status'] == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="Belum" {{ $item['status'] == 'Belum' ? 'selected' : '' }}>Belum</option>
              </select>
            </td>

            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>

  <script>
    function toggleStatus(button) {
      if (button.classList.contains('lunas')) {
        button.classList.remove('lunas');
        button.classList.add('belum');
        button.textContent = 'Belum';
      } else {
        button.classList.remove('belum');
        button.classList.add('lunas');
        button.textContent = 'Lunas';
      }
    }
  </script>
</body>
</html>
