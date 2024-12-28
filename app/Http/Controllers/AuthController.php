<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('Halaman.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Mencoba login
        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect()->intended('/'); // Redirect ke halaman yang dimaksud
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Kredensial yang dimasukkan tidak valid.',
        ]);
    }

    // Menampilkan halaman registrasi
    public function showRegistrationForm()
    {
        return view('Halaman.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard
        return redirect('/');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
