<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login.
     */
    public function index()
    {
        return view('index'); // Mengarahkan ke file index.blade.php
    }

    /**
     * Menangani proses autentikasi.
     */
    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // TAMBAHKAN LOGIKA INI
        if (Auth::user()->is_admin) {
            // Jika user adalah admin, redirect ke dashboard admin
            return redirect()->route('admin.products.index');
        }

        // Jika user biasa, redirect ke dashboard biasa
        return redirect()->intended('/');
    }

    return back()->withErrors([
        'gagal' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    } 
}