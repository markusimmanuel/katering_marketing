<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="{{ asset('css/register-style.css') }}"> <!-- Tambahkan link CSS -->
</head>
<body id="register-page">
    <div class="register-container">
        <div class="register-form">
            <h2 class="register-title">Daftar</h2>
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Input Nama -->
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <!-- Input Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <!-- Input Password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <!-- Input Password Confirmation -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                <!-- Input Role -->
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="merchant">Merchant</option>
                        <option value="customer">Customer</option>
                    </select>
                </div>

                <!-- Tombol Register -->
                <button type="submit" class="btn btn-primary">Daftar</button>
                <p class="login-text-center">Sudah punya akun ? <a href="{{ route('login') }}">Login disini</a></p>
            </form>
        </div>
    </div>
</body>
</html>
