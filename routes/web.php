<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/password/reqeust', [LoginController::class, 'showLoginForm'])->name('password.request');
Route::get('/register', [LoginController::class, 'showLoginForm'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
