<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/password/request', [ForgotPasswordController::class, 'index'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile/show', [RegisterController::class, 'index'])->name('profile.show');

    // Admin Panel Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Content Management
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/create', [PostController::class, 'index'])->name('create');
            Route::get('/categories', [PostController::class, 'index'])->name('categories');
        });

        // Media Management
        Route::prefix('media')->name('media.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // User Management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });
        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // Reports
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('/analytics', [DashboardController::class, 'index'])->name('analytics');
            Route::get('/users', [DashboardController::class, 'index'])->name('users');
            Route::get('/activity', [DashboardController::class, 'index'])->name('activity');
        });

        // Activity Logs
        Route::prefix('activity')->name('activity.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // Help Center
        Route::prefix('help')->name('help.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });
    });
});
