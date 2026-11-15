<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/applications/create', [ApplicationController::class, 'create']);
    Route::get('/applications', [ApplicationController::class, 'index']);
    Route::post('/applications/create', [ApplicationController::class, 'store']);
});

Route::middleware('guest')->group(function() {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('CheckRole')->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::patch('/applications/update/{id}', [ApplicationController::class, 'updateStatus']);
});

Route::view('/', 'index');
