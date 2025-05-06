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
          <input type="text" name="username" value="{{ old('username') }}" required>
          @error('username')
            <span>{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" require>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group gender-group">
          <label>Jenis Kelamin</label>
          <div class="radio-group">
            <label for="L"><input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}>Laki-Laki</label>
            <label><input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}> Perempuan</label>
          </div>
          @error('jenis_kelamin')
            <span>{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
          <label>No Telp</label>
          <input type="text" name="no_telp" value="{{ old('no_telp') }}" required>
          @error('no_telp')
            <span>{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required>
          @error('password')
            <span>{{ $message }}</span>
        @enderror
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

</body>
</html>
