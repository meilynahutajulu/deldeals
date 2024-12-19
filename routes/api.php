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
Route::middleware('auth:sanctum')->get('/profile', [ProfileController::class, 'profile']);
Route::middleware('auth:sanctum')->get('/tokosaya', [TokoSayaController::class, 'index']);
Route::middleware('auth:sanctum')->get('/keranjang', [KeranjangController::class, 'showKeranjang']);
