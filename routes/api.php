<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [App\Http\Controllers\AuthController::class, 'user']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

// ToDoAPI
Route::get('todos', [\App\Http\Controllers\TodoController::class, 'index']);
Route::post('todos', [\App\Http\Controllers\TodoController::class, 'store']);
Route::get('todos/{id}', [\App\Http\Controllers\TodoController::class, 'show']);
Route::put('todos/{id}', [\App\Http\Controllers\TodoController::class, 'update']);
Route::delete('todos/{id}', [\App\Http\Controllers\TodoController::class, 'destroy']);

// PokemonAPI
Route::get('pokemon', [\App\Http\Controllers\PokemonController::class, 'index']);
