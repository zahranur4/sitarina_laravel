<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserOtp;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register'); // Ganti 'register' dengan nama file blade Anda
    }

    /**
     * Menyimpan user baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input seperti biasa
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Buat user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // 3. Login user yang baru dibuat
        Auth::login($user);

        // 4. Redirect ke halaman dashboard
        return redirect('/');
    }
}
