<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ArticleController as DashboardArticleController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('blog.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('blog.show');

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/articles/create', [DashboardArticleController::class, 'create'])->name('articles.create');
    Route::post('/dashboard/articles', [DashboardArticleController::class, 'store'])->name('articles.store');
    Route::get('/dashboard/articles/{article}/edit', [DashboardArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/dashboard/articles/{article}', [DashboardArticleController::class, 'update'])->name('articles.update');
    Route::delete('/dashboard/articles/{article}', [DashboardArticleController::class, 'destroy'])->name('articles.destroy');
});
