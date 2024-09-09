<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'index'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::resource('register', RegisterController::class)->only(['index', 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('change-password', NewPasswordController::class)->name('password.change');
    Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
