<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan form login
    public function loginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect ke dashboard sesuai role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'guru') {
                return redirect()->route('guru.index');
            } else {
                return redirect()->route('siswa.index');
            }
        }

        return redirect()->back()->withErrors('Login gagal, periksa email dan password Anda.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
