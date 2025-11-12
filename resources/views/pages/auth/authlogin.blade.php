<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // GET /auth → tampilkan halaman login
    public function index()
    {
        return view('auth.login_form');
    }

    // POST /auth/login → proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/[A-Z]/', $value)) {
                        $fail('Password harus mengandung minimal satu huruf kapital.');
                    }
                }
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Logika: username harus sama dengan password
        if ($username === $password) {
            return view('auth.success', [
                'message' => "Selamat datang, $username! Login berhasil."
            ]);
        }

        return back()->withErrors(['login' => 'Username dan password harus sama untuk login.'])->withInput();
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class AuthController extends Controller
// {
//     // GET /auth → tampilkan halaman login
//     public function index()
//     {
//         return view('auth.login_form');
//     }

//     // POST /auth/login → proses login
//     public function login(Request $request)
//     {
//         // Validasi input
//         $request->validate([
//             'username' => 'required',
//             'password' => [
//                 'required',
//                 'min:3',
//                 function ($attribute, $value, $fail) {
//                     if (!preg_match('/[A-Z]/', $value)) {
//                         $fail('Password harus mengandung minimal satu huruf kapital.');
//                     }
//                 }
//             ],
//         ], [
//             'username.required' => 'Username wajib diisi.',
//             'password.required' => 'Password wajib diisi.',
//             'password.min' => 'Password minimal 3 karakter.',
//         ]);

//         $username = $request->input('username');
//         $password = $request->input('password');

//         // Logika: username harus sama dengan password
//         if ($username === $password) {
//             return view('auth.success', [
//                 'message' => "Selamat datang, $username! Login berhasil."
//             ]);
//         }

//         return back()->withErrors(['login' => 'Username dan password harus sama untuk login.'])->withInput();
//     }
// }
