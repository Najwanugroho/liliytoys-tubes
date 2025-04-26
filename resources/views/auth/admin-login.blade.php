<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin</title>
  <link rel="stylesheet" href="{{ asset('css/login-admin.css') }}">
</head>
<body>

  <div class="background">
    <div class="login-container">
      <h2>Login</h2>
      <h3>Admin</h3>
      <form action="/admin-home" method="GET">
        @csrf
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>
        <a href="/admin-home"><button type="submit">Submit</button></a>
      </form>
    </div>
  </div>

</body>
</html>
