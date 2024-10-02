<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ToDoAPI
Route::get('todos', [\App\Http\Controllers\TodoController::class, 'index']);
Route::post('todos', [\App\Http\Controllers\TodoController::class, 'store']);
Route::get('todos/{id}', [\App\Http\Controllers\TodoController::class, 'show']);
Route::put('todos/{id}', [\App\Http\Controllers\TodoController::class, 'update']);
Route::delete('todos/{id}', [\App\Http\Controllers\TodoController::class, 'destroy']);

// PokemonAPI
Route::get('pokemon', [\App\Http\Controllers\PokemonController::class, 'index']);