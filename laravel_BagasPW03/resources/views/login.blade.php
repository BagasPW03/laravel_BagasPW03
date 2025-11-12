{{-- resources/views/auth/login.blade.php --}}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .card {
            border-radius: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm" style="width:100%; max-width:400px;">
            <div class="card-body">
                <h2 class="mb-3 text-center">Login</h2>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" name="username" type="text"
                            class="form-control value="{{ old('username') }}"
                            required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password"
                            class="form-control" required>

                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Sign in</button>

                    <div class="text-center">
                        <p class="mb-0">Not a member? <a
                                href="{{ route('register') ?? url('/register') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
