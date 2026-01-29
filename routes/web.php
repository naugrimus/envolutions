<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\RedirectNotAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('home');

Route::post('/login', [AuthenticationController::class, 'authenticate'])
    ->name('login');


Route::middleware(RedirectNotAuthenticated::class)->group(function () {
    Route::Resource('ticket', TicketController::class);
    Route::resource('ticket.reply', ReplyController::class);
});


