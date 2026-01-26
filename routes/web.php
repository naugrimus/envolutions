<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthenticationController::class, 'authenticate'])
    ->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
