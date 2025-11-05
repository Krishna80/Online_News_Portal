<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// ----------------------------
// Frontend Routes
// ----------------------------

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('index');

// Optional alias for /home
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/latest', [HomeController::class, 'latest'])->name('latest');

Route::get('/navigation', function () {
    return view('custom.navigation');
});

Route::get('/social', function () {
    return view('custom.social');
});

// ----------------------------
// Admin Authentication Routes
// ----------------------------
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ----------------------------
// Protected Admin Routes
// ----------------------------
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Category CRUD
    Route::resource('categories', CategoryController::class);

    // Article CRUD
    Route::resource('articles', ArticleController::class);

    // TinyMCE image upload
    Route::post('articles/upload', [ArticleController::class, 'upload'])->name('articles.upload');
    Route::put('/articles/{artid}', [ArticleController::class, 'update'])->name('articles.update');
});
