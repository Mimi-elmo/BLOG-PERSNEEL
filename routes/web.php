<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 

Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');







