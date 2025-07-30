<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
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
      <img src="{{ asset('img/sitarinas logo.png') }}" alt="Logo Lokaline" width="100px" class="m-auto">
      <h2 class="text-center mb-4">Register</h2>
      
      <form method="POST" action="{{ url('/register') }}">
        @csrf
        
        <div class="mb-3">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{ old('name') }}" required>
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        </div>
        
        <button type="submit" class="btn btn-dark w-100">Register</button>
        
        <p class="text-center text-muted mt-4">
          Already have an account? <a href="{{ url('/login') }}" class="text-decoration-none">Login</a>
        </p>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>