<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function()
{
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('showRegisterForm');
});

Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::redirect('/', 'post');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('post', PostsController::class);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});