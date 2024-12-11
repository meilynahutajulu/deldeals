<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\penggunacontroller;

use App\Http\Controllers\Auth\SocialiteController as DelDealsSocialiteController; 
use App\Http\Controllers\TokoSayaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;

// Route for main item page
Route::get('/main', [MainController::class, 'index'])->name('main');


// Toko Saya routes
Route::get('/tokosaya', [TokoSayaController::class, 'index'])->name('tokosaya');


Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'showEditProfile'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Authentication routes
Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard');
});
    
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
Route::get('/add-items', function () {
    return view('add-items');
});

// Registration routes
Route::get('/registrasi', [UserController::class, 'create'])->name('register')->middleware('guest');
Route::post('/registrasi', [UserController::class, 'store'])->name('pengguna.store')->middleware('guest');

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
Route::post('/add-item', [ItemController::class, 'store'])->name('item.store');
Route::get('/add-items', function () {
    return view('add-items');
});

// Google Socialite login routes
Route::get('/deldeals/redirect', [DelDealsSocialiteController::class, 'redirect']);
Route::get('/deldeals/google/callback', [DelDealsSocialiteController::class, 'callback']);

// Image upload route
Route::get('/upload', [ImageUploadController::class, 'store']);
