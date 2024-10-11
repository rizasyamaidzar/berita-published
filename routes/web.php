<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [GuestController::class, 'home'])->name('login');

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});
Route::post('/logout', [LoginController::class, 'logout']);
// ROUTE DAHSBOARD
Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

// ROUTE Category-MANAGEMENT
Route::group(['middleware' => ['auth'], 'prefix' => 'category-management'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::get('/{nama}', [CategoryController::class, 'show'])->name('category.show');
    Route::post('/create', [CategoryController::class, 'addCategory'])->name('category.create');
    Route::post('/update', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::post('/delete', [CategoryController::class, 'deleteCategory'])->name('category.delete');
});

// ROUTE BERITA-MANAGEMENT
Route::group(['middleware' => ['auth'], 'prefix' => 'berita-management'], function () {
    Route::get('/', [BeritaController::class, 'listBerita'])->name('berita');
    Route::get('/show/{id}', [BeritaController::class, 'showBerita'])->name('berita.show');
    Route::get('/{id}/edit', [BeritaController::class, 'editBerita'])->name('berita.edit');
    Route::get('/create', [BeritaController::class, 'createBerita'])->name('berita.create');
    Route::post('/beritaCreate', [BeritaController::class, 'addBerita'])->name('berita.store');
    Route::post('/beritaUpdate', [BeritaController::class, 'updateBerita'])->name('berita.update');
    Route::post('/beritaDelete', [BeritaController::class, 'deleteBerita'])->name('berita.delete');
});


Route::get('/news', [GuestController::class, 'berita'])->name('news');
Route::get('/news/{judul}', [GuestController::class, 'beritaView'])->name('news');

Route::fallback([GuestController::class, 'error_page'])->name('error_page');
