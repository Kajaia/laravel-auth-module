<?php

use Illuminate\Support\Facades\Route;
use Modules\auth\app\Http\Controllers\LoginController;
use Modules\auth\app\Http\Controllers\LogoutController;
use Modules\auth\app\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function() {
    // Login
    Route::view('/login', 'auth::auth.login')->name('auth.login');
    Route::post('/login', LoginController::class)->name('login');

    // Register
    Route::view('/register', 'auth::auth.register')->name('auth.register');
    Route::post('/register', RegisterController::class)->name('register');
});

Route::middleware('auth')->group(function() {
    // Logout
    Route::post('/logout', LogoutController::class)->name('logout');

    // Dashboard
    Route::view('/dashboard', 'auth::index')->name('dashboard');
});