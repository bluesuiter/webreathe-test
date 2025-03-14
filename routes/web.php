<?php

use Illuminate\Support\Facades\Route;

// Login page
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::middleware(['web', 'auth'])->group(function () {
    Auth::routes(['login' => false]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::resource('user', App\Http\Controllers\UsersController::class);
    Route::resource('modules', App\Http\Controllers\ModulesController::class);
});
