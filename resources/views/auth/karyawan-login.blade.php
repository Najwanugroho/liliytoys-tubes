<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Karyawan</title>
  <link rel="stylesheet" href="{{ asset('css/login-karyawan.css') }}">
</head>
<body>

  <div class="background">
    <div class="login-container">
      <h2>Login</h2>
      <h3>Karyawan</h3>

      <form action="{{ route('karyawan.home') }}" method="POST">
        @csrf
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

</body>
</html>
