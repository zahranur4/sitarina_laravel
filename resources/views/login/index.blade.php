<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link
      rel="shortcut icon"
      href="{{asset('img/favicon.png')}}"
      type="image/x-icon"
    />
</head>
<body style="background-color: #001f3f; color: white;">
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px; border-radius: 10px; background-color: #f8f9fa; color: #343a40;">
      <img src="{{ asset('img/sitarinas logo.png') }}" alt="Logo Sitarina" width="100px" class="m-auto">
      <h2 class="text-center mb-4">Login</h2>

      <form method="POST" action="{{ url('/login') }}">
        @csrf

        {{-- Menampilkan pesan error jika ada --}}
        @error('gagal')
          <div class="alert alert-danger p-2 text-center" role="alert">
            {{ $message }}
          </div>
        @enderror

        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-dark w-100">Login</button>
        <p class="text-center text-muted mt-4">
          Don't have an account? <a href="{{url('/register')}}" class="text-decoration-none">Register</a>
        </p>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>