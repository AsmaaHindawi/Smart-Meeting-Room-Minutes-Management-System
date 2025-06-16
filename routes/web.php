<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

// in routes/web.php
Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});

Route::get('/rooms', [App\Http\Controllers\RoomController::class, 'index']);
Route::get('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'show']);
Route::post('/rooms', [App\Http\Controllers\RoomController::class, 'store']);
Route::put('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'update']);
Route::delete('/rooms/{id}', [App\Http\Controllers\RoomController::class, 'destroy']);

require __DIR__.'/auth.php';
