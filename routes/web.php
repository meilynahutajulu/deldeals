<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\penggunacontroller;

use App\Http\Controllers\Auth\SocialiteController as DelDealsSocialiteController; 
use App\Http\Controllers\TokoSayaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\KeranjangController;

// Static pages
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route for main item page
Route::get('/main', [MainController::class, 'index'])->name('main'); //menampilkan beranda


// Toko Saya routes
Route::get('/tokosaya', [TokoSayaController::class, 'index'])->name('tokosaya');


Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'showEditProfile'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Authentication routes


Route::get('/forgot-pass', [AuthController::class, 'forgotPass'])->name('forgot-password');
Route::post('/forgot-pass-act', [AuthController::class, 'forgotPassAct'])->name('forgot-password-act');
Route::get('/validasi-forgot-pass/{token}', [AuthController::class, 'validasiForgotPass'])->name('validasi-forgot-pass');
Route::post('/validasi-forgot-pass-act', [AuthController::class, 'validasiForgotPassAct'])->name('validasi-forgot-pass-act');




// Registration routes
Route::get('/registrasi', [UserController::class, 'create'])->name('register');
Route::post('/registrasi', [UserController::class, 'store'])->name('pengguna.store');

// Password recovery routes
Route::get('/forgot_password', function () {
    return view('forgot_password');
});
Route::get('/otp', function () {
    return view('otp');
})->name('otp');
Route::get('/change-password', function () {
    return view('changePassword');
});
Route::get('/succPass', function () {
    return view('passChangeSuccess');
})->name('succPass');

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

Route::post('/keranjang/add/{id}', [KeranjangController::class, 'addToKeranjang'])->name('keranjang.add');
Route::get('/keranjang', [KeranjangController::class, 'showKeranjang'])->name('keranjang');
Route::delete('/keranjang/remove/{id}', [KeranjangController::class, 'removeFromKeranjang'])->name('keranjang.remove');


Route::get('/item/{id}', [PenggunaController::class, 'show'])->name('item.details');

Route::delete('/toko/{id}', [ItemController::class, 'remove'])->name('item.remove');
