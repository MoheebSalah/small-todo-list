<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks', [\App\Http\Controllers\TaskController::class, 'index']);

Route::get('/tasks/create', [\App\Http\Controllers\TaskController::class, 'create']);
Route::post('/tasks', [\App\Http\Controllers\TaskController::class, 'store']);

Route::get('/tasks/{task}/edit', [\App\Http\Controllers\TaskController::class, 'edit']);
Route::put('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'update']);

Route::get('/tasks/{task}', [\App\Http\Controllers\TaskController::class, 'show']);
Route::delete('tasks/{task}', [\App\Http\Controllers\TaskController::class, 'destroy']);

Route::view('/register', 'auth.register');


