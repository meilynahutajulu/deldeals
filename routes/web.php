<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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