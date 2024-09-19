<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::middleware('auth')->group(function () {
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/login', [AuthenticatedSessionController::class, 'index']);
Route::prefix('/competition')->controller(CompetitionController::class)->group(function() {
    Route::get('/web-app', 'webApp');
    Route::get('/ctf', 'ctf');
    Route::get('/ui-ux', 'uiux');
});
