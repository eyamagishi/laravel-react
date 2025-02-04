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
Route::prefix('todos')->name('todos.')->group(function () {
    Route::apiResource('/', TodoController::class)->parameters(['' => 'id']);
});

// PokemonAPI
Route::prefix('pokemon')->name('pokemon.')->group(function () {
    Route::apiResource('/', PokemonController::class)->parameters(['' => 'id']);
});
