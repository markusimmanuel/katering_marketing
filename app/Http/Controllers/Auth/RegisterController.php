<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:merchant,customer', // Validasi peran (role)
            ]);
            echo '<script>alert(1)</script>';
            // Buat pengguna baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role, // Role berdasarkan input user
            ]);

            // Login otomatis setelah registrasi
            auth()->login($user);

            if ($user->role === 'merchant') {
                return redirect()->intended('/merchant/dashboard');
            } else {
                return redirect()->intended('/customer/dashboard');
            }

        } catch (Exception $e) {
            return back()->withErrors(['registration_error' => 'Registrasi gagal, silakan coba lagi.']);
        }
    }
}
