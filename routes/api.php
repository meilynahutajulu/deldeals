<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoSayaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;

// Authentication routes for API
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Password reset routes
Route::post('/forgot-password', [AuthController::class, 'forgotPass']);
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest');

// Main Routes
Route::middleware('auth:sanctum')->get('/main', [MainController::class, 'index']);
Route::middleware('auth:sanctum')->get('/shop', [TokoSayaController::class, 'index']);

// Profile Routes
Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'profile']);
Route::middleware('auth:sanctum')->post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Toko Saya Routes
Route::middleware('auth:sanctum')->get('/tokosaya', [TokoSayaController::class, 'index']);
Route::middleware('auth:sanctum')->post('/add-item', [ItemController::class, 'store'])->name('item.store');

// Keranjang Routes
Route::middleware('auth:sanctum')->get('/keranjang', [KeranjangController::class, 'showKeranjang']);
Route::middleware('auth:sanctum')->post('/keranjang/add/{id}', [KeranjangController::class, 'addToKeranjang'])->name('keranjang.add');
Route::middleware('auth:sanctum')->delete('/keranjang/remove/{id}', [KeranjangController::class, 'removeFromKeranjang'])->name('keranjang.remove');
