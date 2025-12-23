<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // FORM LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // Validasi email & password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau password salah.');
        }

        // SET SESSION (BENAR UNTUK LARAVEL 11)
        $request->session()->put('user_id', $user->id);  // ← FIX DISINI
        $request->session()->put('user_name', $user->name);
        $request->session()->put('role', $user->role);   // pastikan kolom role ada di DB
        $request->session()->put('last_login', now()->format('d M Y H:i'));

        return redirect()->route('dashboard')->with('success', 'Berhasil login!');
    }

    // FORM REGISTER
    public function registerForm()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,petugas',
        ]);

        // SIMPAN USER BARU
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        // AUTO LOGIN
        $request->session()->put('user_id', $user->id); // ← FIX DISINI
        $request->session()->put('user_name', $user->name);
        $request->session()->put('role', $user->role);
        $request->session()->put('last_login', now()->format('d M Y H:i'));

        return redirect()->route('dashboard')->with('success', 'Akun berhasil dibuat.');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.form')->with('success', 'Berhasil logout.');
    }
}
