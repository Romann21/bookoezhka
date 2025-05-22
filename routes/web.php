<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookCardController;
use App\Http\Controllers\AdminController;

// Auth
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Book Cards
Route::middleware('auth')->group(function () {
    Route::get('/', [BookCardController::class, 'index'])->name('home');
    Route::resource('cards', BookCardController::class)->except(['show', 'edit', 'update']);
});

// Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/cards/{card}/approve', [AdminController::class, 'approve'])->name('admin.cards.approve');
    Route::post('/cards/{card}/reject', [AdminController::class, 'reject'])->name('admin.cards.reject');
});