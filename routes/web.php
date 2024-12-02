<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\SocialiteController as DelDealsSocialiteController; 
use App\Http\Controllers\TokoSayaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;

// Route for main item page
Route::get('/main', [ItemController::class, 'main'])->name('main');

// Toko Saya routes
Route::get('/tokosaya', [TokoSayaController::class, 'index']);

// Profile routes with authentication middleware
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/editprofile', [ProfileController::class, 'editProfile'])->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('pengguna.update');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Static pages
Route::get('/', function () {
    return view('dashboard');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/pengaturan', function () {
    return view('pengaturan');
});
Route::get('/forgot-pass', function () {
    return view('forgot');
});
Route::get('/keranjang', function () {
    return view('keranjang');
});

// Registration routes
Route::get('/registrasi', [UserController::class, 'create'])->name('register');
Route::post('/registrasi', [UserController::class, 'store'])->name('pengguna.store');

// Password recovery routes
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

// User management routes
Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');

// Item management routes
Route::get('/shop', [ItemController::class, 'index'])->name('shop');
Route::post('/add-item', [ItemController::class, 'store']);
Route::get('/add-items', function () {
    return view('add-items');
});

// Google Socialite login routes
Route::get('/deldeals/redirect', [DelDealsSocialiteController::class, 'redirect']);
Route::get('/deldeals/google/callback', [DelDealsSocialiteController::class, 'callback']);

// Image upload route
Route::get('/upload', [ImageUploadController::class, 'store']);
