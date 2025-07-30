<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil user yang sedang login.
     */
    public function show()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Tampilkan view dan kirim data user
        return view('profile.index', ['user' => $user]);
    }

    /**
     * Mengupdate data profil user.
     */
    public function update(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'string|max:15',
            'address' => 'string|max:255',
        ]);

        // Update data user
        $user->update($validatedData);

        // Redirect kembali ke halaman profil dengan pesan sukses
        return back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy(Request $request)
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Logout user terlebih dahulu
        Auth::logout();

        // Hapus record user dari database
        if ($user->delete()) {
            // Invalidate session dan regenerate token
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect ke halaman utama dengan pesan sukses
            return redirect('/')->with('success', 'Akun Anda telah berhasil dihapus.');
        }

        // Jika gagal, kembali
        return back()->with('error', 'Gagal menghapus akun.');
    }
}