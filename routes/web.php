<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [AuthenticationController::class, 'authenticate'])
    ->name('login');


Route::Resource('ticket', TicketController::class);

