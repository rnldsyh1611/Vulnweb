<?php

use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/welcome', function () {
//     return view('welcome');
// });
Route::get('/',[HalamanController::class,'index']);
// Route untuk menampilkan form registrasi

Route::get('/registrasi', [AuthController::class, 'showRegister']);
Route::post('/registrasi', [AuthController::class, 'processRegister']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'processLogin']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);