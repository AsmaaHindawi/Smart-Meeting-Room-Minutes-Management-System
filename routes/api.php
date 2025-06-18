<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// ✅ Laravel Breeze Auth Routes
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', UserController::class);

Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index']);
Route::get('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'show']);
Route::post('/rooms', [App\Http\Controllers\RoomController::class, 'store']);
Route::put('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'update']);
Route::delete('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'destroy']);
