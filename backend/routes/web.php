<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

// Redirect root to admin login
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Authentication Routes (for admin guard)
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Protected Admin Routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Category CRUD
    Route::resource('categories', CategoryController::class);

    // Article CRUD
    Route::resource('articles', ArticleController::class);

    // TinyMCE image upload
    Route::post('articles/upload', [ArticleController::class, 'upload'])->name('articles.upload');
});
