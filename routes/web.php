<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/registrasi', function () {
<<<<<<< Updated upstream
    return view('home');
});

Route::get('/pengaturan', function () {
    return view('pengaturan');
});

Route::get('/penilaian', function () {
    return view('penilaian');
=======
    return view('registrasi');
>>>>>>> Stashed changes
});