<?php

use Illuminate\Support\Facades\Route;
// Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\PokemonController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [AuthController::class, 'user'])->name('user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ToDoAPI
Route::get('todos', [TodoController::class, 'index']);
Route::post('todos', [TodoController::class, 'store']);
Route::get('todos/{id}', [TodoController::class, 'show']);
Route::put('todos/{id}', [TodoController::class, 'update']);
Route::delete('todos/{id}', [TodoController::class, 'destroy']);

// PokemonAPI
Route::get('pokemon', [PokemonController::class, 'index']);
