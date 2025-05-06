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
            <p class="tanggal">Tanggal: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>

            <div class="user-profile">
              <img src="{{ asset('images/User.png') }}" alt="User" class="user-icon">
              <span class="username">Karyawan</span>
            </div>

            <div class="button-group">
              <button>Done</button>
              <button id="addCustomerButton" type="button">+ Add Customer</button>
            </div>
          </div>

      </header>


      <table>
        <thead>
          <tr>
            <th></th>
            <th>No.</th>
            <th>Nama Permainan</th>
            <th>Waktu</th>
            <th>Harga</th>
            <th>Status Pembayaran</th>
            <th>Ket.</th>
          </tr>
        </thead>
        <tbody id="catatanTbody">
            @foreach ($catatan as $index => $item)

          <tr class="{{ isset($item['waktu_habis']) && $item['waktu_habis'] ? 'expired' : '' }}">

          <td>
            <input 
              type="checkbox"
              name="laporan_cek[]"
              value="{{ $item['id'] }}"
              style="transform: scale(0.8);"
              {{ $item['checked'] ? 'checked' : '' }}
              onchange="updateCheckboxStatus({{ $item['id'] }}, this.checked)"
            >
          </td>

          <td>{{ $index + 1 }}.</td>

            {{-- Dropdown Permainan --}}
            <td>
              <select name="nama_permainan" class="dropdown-permainan">
                <option value="Skuter" {{ $item['nama'] == 'Skuter' ? 'selected' : '' }}>Skuter</option>
                <option value="Mobil" {{ $item['nama'] == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="Motor" {{ $item['nama'] == 'Motor' ? 'selected' : '' }}>Motor</option>
                <option value="Melukis" {{ $item['nama'] == 'Melukis' ? 'selected' : '' }}>Melukis</option>
                <option value="Rumah Pintar" {{ $item['nama'] == 'Rumah Pintar' ? 'selected' : '' }}>Rumah Pintar</option>
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

      <!-- Modal -->
      
      <div id="addCustomerModal" class="modal" style="display: none;">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>

      <form action="{{ route('catatan.tambah') }}" method="POST">
        @csrf
        <label for="nama_permainan">Nama Permainan:</label>
        <select name="nama_permainan" id="namaPermainanSelect" onchange="updateHarga()" required>
          <option value="Skuter">Skuter</option>
          <option value="Mobil">Mobil</option>
          <option value="Motor">Motor</option>
          <option value="Melukis">Melukis</option>
          <option value="Rumah Pintar">Rumah Pintar</option>
        </select>

        <label for="waktu">Waktu:</label>
        <input type="text" id="waktuInput" name="waktu" readonly required>


        <label for="harga">Harga:</label>
        <input type="number" id="hargaInput" name="harga" value="15000" required>

        <label for="status">Status Pembayaran:</label>
        <select name="status" required>
          <option value="Lunas">Lunas</option>
          <option value="Belum">Belum</option>
        </select>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" placeholder="Opsional...">

        <button type="submit">Tambah</button>
      </form>
    </div>
  </div>

  <script>
    const modal = document.getElementById('addCustomerModal');
    const addBtn = document.getElementById('addCustomerButton'); 

  // Menutup modal saat tombol close diklik
  function closeModal() {
    modal.style.display = 'none';
  }

  // Menutup modal jika area luar modal diklik
  window.onclick = function(event) {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  };

  function updateHarga() {
    const permainan = document.getElementById('namaPermainanSelect').value;
    const hargaInput = document.getElementById('hargaInput');
    if (permainan === 'Skuter') {
      hargaInput.value = 10000;
    } else {
      hargaInput.value = 15000;
    }
  }

  function updateWaktu() {
    const permainan = document.getElementById('namaPermainanSelect').value;
    const waktuInput = document.getElementById('waktuInput');

    const now = new Date();
    let end = new Date(now);

    const format = (date) =>
    date.toTimeString().slice(0, 5); // HH:MM format


    if (permainan === 'Skuter') {
    end.setMinutes(now.getMinutes() + 20);
    waktuInput.value = `${format(now)} - ${format(end)}`;
  } else if (permainan == 'Melukis' || permainan == 'Rumah Pintar') {
    waktuInput.value = format(now);
    return;
  } else {
    end.setMinutes(now.getMinutes() + 15);
    waktuInput.value = `${format(now)} - ${format(end)}`;
  }

}

document.getElementById('namaPermainanSelect').addEventListener('change', updateWaktu);

window.onload = function() {
    updateWaktu(); // Pastikan waktu terisi saat pertama kali load
  }



  function tandaiWaktuHabis() {
    const rows = document.querySelectorAll('#catatanTbody tr');

    const now = new Date();
    const nowMinutes = now.getHours() * 60 + now.getMinutes();

    rows.forEach(row => {
      const waktuCell = row.querySelector('td:nth-child(4)'); // kolom Waktu

      if (!waktuCell) return;

      const waktuText = waktuCell.textContent.trim(); // contoh: "08:00 - 08:20" atau "08:00"

      const parts = waktuText.split('-');

      if (parts.length === 2) {
        const endTime = parts[1].trim(); // ambil "08:20"
        const [endHour, endMinute] = endTime.split(':').map(Number);
        const endTotalMinutes = endHour * 60 + endMinute;

        if (nowMinutes >= endTotalMinutes) {
          row.classList.add('expired');
        }
      }
    });
  }

  // Panggil fungsi saat halaman sudah selesai dimuat
  window.addEventListener('DOMContentLoaded', tandaiWaktuHabis);
  setInterval(tandaiWaktuHabis, 60000); // cek ulang tiap 1 menit


  function updateSelectStyle(selectElement, id) {
    const status = selectElement.value;

    // Kirim data ke server
    fetch('{{ route('catatan.updateStatus') }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        id: id,
        status: status
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Berhasil update, langsung update tampilan
        selectElement.classList.remove('lunas', 'belum');
        selectElement.classList.add(status.toLowerCase());
      } else {
        alert('Gagal update status');
      }
    })
    .catch(error => {
      console.error('Error:', error);
    });
  }

  let selectedCheckboxes = {};

  function pindahKeBawahCheckbox() {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  const tbody = document.getElementById('catatanTbody');
  
  checkboxes.forEach((checkbox, index) => {
    const tr = checkbox.closest('tr');

    if (selectedCheckboxes[index]) {
      checkbox.checked = true;
      tbody.appendChild(tr);
    }

    checkbox.addEventListener('change', function () {
      if (this.checked) {
        selectedCheckboxes[index] = true;
        tbody.appendChild(tr);
      } else {
        selectedCheckboxes[index] = false;
        tbody.prepend(tr);
      }
    });
  });
}

function addCustomerHandler() {
  // Ambil status checkbox saat ini
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
  checkboxes.forEach(checkbox => {
    // Jika checkbox sudah dicentang, pindahkan baris ke bawah
    if (checkbox.checked) {
      const tr = checkbox.closest('tr');
      const tbody = document.getElementById('catatanTbody');
      tbody.appendChild(tr); // Pindahkan baris ke bawah
    }
  });

  pindahKeBawahCheckbox();
}

// Event listener untuk modal add customer
addBtn.addEventListener('click', () => {
  modal.style.display = 'block';
  updateHarga();
  addCustomerHandler(); // Panggil fungsi ini setelah modal muncul dan customer ditambahkan
});

// Panggil fungsi ketika halaman sudah siap
document.addEventListener('DOMContentLoaded', () => {
  pindahKeBawahCheckbox(); // Panggil untuk memindahkan baris ke bawah ketika checkbox dicentang
});

function updateCheckboxStatus(id, status) {
  fetch('{{ route('catatan.updateCheckbox') }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      id: id,
      checked: status
    })
  })
  .then(response => response.json())
  .then(data => {
    if (!data.success) {
      alert('Gagal update checkbox');
    }
  });
}


  </script>
</body>
</html>
