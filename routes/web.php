<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class)->except(['show']);
    Route::resource('bookings', BookingController::class)->only(['index', 'show', 'create', 'store']);
});


Route::get('/', function () {
    return redirect('dashboard');
});
