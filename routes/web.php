<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
//
    Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index']);

    Route::get('/tasks/create', [\App\Http\Controllers\TaskController::class, 'create']);
    Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store']);

    Route::get('/tasks/{task}/edit', [\App\Http\Controllers\TaskController::class, 'edit']);
    Route::put('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'update']);

    Route::get('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'show']);
    Route::delete('tasks/{task}', [\App\Http\Controllers\TaskController::class, 'destroy']);
});

//Registeration

Route::view('/login','auth.login')
    ->middleware('guest');
Route::post('/login',\App\Http\Controllers\Auth\LoginController::class )
    ->middleware('guest')
    ->name('login');

Route::post('/register', \App\Http\Controllers\Auth\RegisterController::class )
    ->middleware('guest');
Route::view('/register', 'auth.register')
    ->middleware('guest');

Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)
    ->middleware('auth');



