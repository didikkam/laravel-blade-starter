<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/password/reqeust', [ForgotPasswordController::class, 'index'])->name('password.request');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');


// dummy
Route::post('/logout', [LoginController::class, 'login'])->name('logout');
Route::get('/profile/show', [RegisterController::class, 'index'])->name('profile.show');
Route::post('/password/email', [ForgotPasswordController::class, 'index'])->name('password.email');

Route::get('/settings', [DashboardController::class, 'index'])->name('settings');
Route::get('/reports/analytics', [DashboardController::class, 'index'])->name('reports.analytics');
Route::get('/activity/index', [DashboardController::class, 'index'])->name('activity.index');
Route::get('/help/index', [DashboardController::class, 'index'])->name('help.index');
Route::get('/posts', [DashboardController::class, 'index'])->name('posts.index');
Route::get('/posts.create', [DashboardController::class, 'index'])->name('posts.create');
Route::get('/posts.categories', [DashboardController::class, 'index'])->name('posts.categories');
Route::get('/users', [DashboardController::class, 'index'])->name('users.index');
Route::get('/roles.index', [DashboardController::class, 'index'])->name('roles.index');
Route::get('/reports/users', [DashboardController::class, 'index'])->name('reports.users');
Route::get('/reports.activity', [DashboardController::class, 'index'])->name('reports.activity');
Route::get('/media.index', [DashboardController::class, 'index'])->name('media.index');
Route::get('/settings.index', [DashboardController::class, 'index'])->name('settings.index');
