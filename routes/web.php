<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\SocialiteController as DelDealsSocialiteController; 
use App\Http\Controllers\TokoSayaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageUploadController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/dashboard', function () {
    return 'Selamat datang di Dashboard!';
})->middleware('auth');


Route::get('/', function () {
    return view('dashboard');
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

Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/registrasi', [UserController::class, 'create'])->name('register');
Route::post('/registrasi', [UserController::class, 'store'])->name('pengguna.store');

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

Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');

Route::get('/add-items', function () {
    return view('add-items');
});


Route::get('/shop', [ItemController::class, 'index'])->name('shop');

Route::post('/add-item', [ItemController::class, 'store']);

Route::get('/deldeals/redirect', [DelDealsSocialiteController::class, 'redirect']);
Route::get('/deldeals/google/callback', [DelDealsSocialiteController::class, 'callback']);

Route::get('/tokosaya', [TokoSayaController::class, 'index']);
Route::get('/upload', [ImageUploadController::class, 'store']);
