<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/password/reqeust', [ForgotPasswordController::class, 'index'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'index'])->name('password.email');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
