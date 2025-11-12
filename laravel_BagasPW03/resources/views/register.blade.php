<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
      <div class="card-body">
        <h2 class="mb-4 text-center">Register Page</h2>

        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input type="text" id="username" name="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}" required autofocus>
            @error('username')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="email">Email Address</label>
            <input type="email" id="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary w-100 mb-3">Submit</button>

          <div class="text-center">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
