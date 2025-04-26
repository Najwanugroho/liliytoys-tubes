<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

  <div class="background">
    <div class="register-container">
      <h2>Register</h2>
      <form action="{{ route('register-karyawan') }}" method="GET">
        @csrf
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" required>
        </div>
        <div class="form-group gender-group">
          <label>Jenis Kelamin</label>
          <div class="radio-group">
            <label><input type="radio" name="gender" value="Pria" required> Pria</label>
            <label><input type="radio" name="gender" value="Perempuan" required> Perempuan</label>
          </div>
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input type="text" name="telp" required>
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
