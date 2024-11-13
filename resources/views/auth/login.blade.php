<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}"> <!-- CSS khusus untuk halaman login -->
</head>
<body id="login-page">
    <div class="login-container">
        <div class="login-form">
            <h2 class="login-title">Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Email Input -->
                <div class="login-form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="login-form-control" required autofocus>
                </div>

                <!-- Password Input -->
                <div class="login-form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="login-form-control" required>
                </div>
                @if ($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Login Button -->
                <button type="submit" class="login-btn login-btn-primary">Login</button>

                <!-- Register Link -->
                <p class="login-text-center">Belum punya akun ? <a href="{{ route('register') }}">Daftar disini</a></p>
            </form>
        </div>
    </div>
</body>
</html>
