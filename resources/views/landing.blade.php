<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lily Toys</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#visi">Visi</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          <li class="nav-item dropdown">
            <a class="btn btn-outline-primary dropdown-toggle ms-2" href="#" data-bs-toggle="dropdown">Login</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/auth/admin-login">Admin</a></li>
              <li><a class="dropdown-item" href="/auth/karyawan-login">Karyawan</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero text-center my-5">
    <div class="container">
      <img src="{{ asset('images/Home.jpg') }}" alt="Home" class="img-fluid rounded">
    </div>
  </section>

<!-- About Section -->
<section class="about-section" id="about">
    <img src="{{ asset('images/Collezioni.jpg') }}" alt="About Us" class="about-img">
  </section>

  <!-- Visi Section -->
  <section class="visi-section" id="visi">
    <img src="{{ asset('images/Visi.jpg') }}" alt="Visi" class="visi-img">
  </section>



  <!-- Contact Section -->
  <section class="contact text-center py-5" id="contact">
    <div class="container">
      <h2 class="mb-4">Our Contact</h2>
      <p><strong>Call Us:</strong> +62xxxxxxxxx</p>
      <p><strong>Location:</strong> Jl. Swadaya Raya RT05/RW02</p>
      <p><strong>Email:</strong> nxxxxxx@gmail.com</p>
      <img src="{{ asset('images/location.jpg') }}" alt="Location" class="img-fluid mt-3" width="400">
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center py-4 bg-white border-top">
    <p>&copy; 2025 Lily Toys</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
