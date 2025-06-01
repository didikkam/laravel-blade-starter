<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::get('/password/request', [ForgotPasswordController::class, 'index'])->name('password.request');
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
            Route::get('/', [PostController::class, 'index'])->middleware('permission:admin.posts.index')->name('index');
            Route::get('/create', [PostController::class, 'create'])->middleware('permission:admin.posts.create')->name('create');
            Route::post('/', [PostController::class, 'store'])->middleware('permission:admin.posts.create')->name('store');
            Route::get('/{post}', [PostController::class, 'show'])->middleware('permission:admin.posts.show')->name('show');
            Route::get('/{post}/edit', [PostController::class, 'edit'])->middleware('permission:admin.posts.edit')->name('edit');
            Route::put('/{post}', [PostController::class, 'update'])->middleware('permission:admin.posts.edit')->name('update');
            Route::delete('/{post}', [PostController::class, 'destroy'])->middleware('permission:admin.posts.destroy')->name('destroy');
        });

        // User Management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->middleware('permission:admin.users.index')->name('index');
            Route::get('/create', [UserController::class, 'create'])->middleware('permission:admin.users.create')->name('create');
            Route::post('/', [UserController::class, 'store'])->middleware('permission:admin.users.create')->name('store');
            Route::get('/{user}', [UserController::class, 'show'])->middleware('permission:admin.users.show')->name('show');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->middleware('permission:admin.users.edit')->name('edit');
            Route::put('/{user}', [UserController::class, 'update'])->middleware('permission:admin.users.edit')->name('update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->middleware('permission:admin.users.destroy')->name('destroy');
        });

        Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->middleware('permission:admin.roles.index')->name('index');
            Route::get('/create', [RoleController::class, 'create'])->middleware('permission:admin.roles.create')->name('create');
            Route::post('/', [RoleController::class, 'store'])->middleware('permission:admin.roles.create')->name('store');
            Route::get('/{role}', [RoleController::class, 'show'])->middleware('permission:admin.roles.show')->name('show');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->middleware('permission:admin.roles.edit')->name('edit');
            Route::put('/{role}', [RoleController::class, 'update'])->middleware('permission:admin.roles.edit')->name('update');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->middleware('permission:admin.roles.destroy')->name('destroy');
        });

    });
});
