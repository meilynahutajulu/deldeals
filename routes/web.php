<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/registrasi', function () {
    return view('registrasi');
});

Route::get('/tokosaya', function () {
    return view('tokosaya');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/forgot-pass', function () {
    return view('forgot');
});

Route::get('/editprofile', function () {
    return view('editprofile');
});

Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('pengguna.store');

Route::get('/main', function () {
    return view('utama');
});

Route::get('/forgot_password', function () {
    return view('forgot_password');
});

Route::get('/otp', function () {
    return view('otp');
});

Route::get('/change-password', function () {
    return view('changePassword');
});

Route::get('/succPass', function () {
    return view('passChangeSuccess');
});

Route::get('/utama', function () {
    return view('utama');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
