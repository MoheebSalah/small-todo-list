<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
});

//Registeration

Route::view('/login', 'auth.login')
    ->middleware('guest');
Route::post('/login', \App\Http\Controllers\Auth\LoginController::class)
    ->middleware('guest')
    ->name('login');

Route::post('/register', \App\Http\Controllers\Auth\RegisterController::class)
    ->middleware('guest');
Route::view('/register', 'auth.register')
    ->middleware('guest');

Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)
    ->middleware('auth');



