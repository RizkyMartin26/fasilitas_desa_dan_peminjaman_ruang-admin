<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login-form');
    }

    // Memproses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek password harus mengandung huruf kapital
        if (!preg_match('/[A-Z]/', $password)) {
            return redirect('/auth')->with('error', 'Password harus mengandung minimal satu huruf kapital.');
        }

        // Jika username dan password sama, dianggap berhasil login
        if ($username === $password) {
            return redirect('/admin/dashboard')->with('success', "Selamat datang, $username!");
        } else {
            return redirect('/auth')->with('error', 'Username dan password tidak cocok.');
        }
    }
}
