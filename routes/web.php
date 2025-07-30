<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('homepage.index');

Route::get('/login', function () {
    return view('login/index');
});

Route::get('/register', function () {
    return view('register/index');
});

Route::get('/payment/{product}', [PaymentController::class, 'show'])->name('pembayaran.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth');