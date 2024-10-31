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

Route::get('/pengaturan', function () {
    return view('pengaturan');
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

Route::get('/kerangjang', function () {
    return view('kerangjang');
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('pengguna.store');
