<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('pages.auth.login-form');
    }

    // Memproses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Cek password harus mengandung huruf kapital
        if (!preg_match('/[A-Z]/', $password)) {
            return back()->with('error', 'Password harus mengandung minimal satu huruf kapital.');
        }

        // Cek apakah email terdaftar
        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak terdaftar.');
        }

        // Verifikasi password (dibandingkan dengan hash di database)
        if (!\Illuminate\Support\Facades\Hash::check($password, $user->password)) {
            return back()->with('error', 'Password salah.');
        }

        // Jika berhasil login, simpan session (atau gunakan Auth bawaan Laravel)
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', "Selamat datang, {$user->name}!");
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.index')->with('success', 'Registrasi berhasil! Silakan login.');
    }


    public function showRegistrationForm()
    {
        return view('pages.auth.register-form');
    }

    public function logout()
    {
        // Logika logout (jika ada sesi, hapus sesi di sini)
        return redirect('/auth')->with('success', 'Anda telah logout.');
    }
}
