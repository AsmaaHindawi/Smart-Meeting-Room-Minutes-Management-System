<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;

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


Route::get('/meetings', [App\Http\Controllers\MeetingController::class, 'index']);
Route::get('/meetings/{id}', [App\Http\Controllers\MeetingController::class, 'show']);
Route::post('/meetings', [App\Http\Controllers\MeetingController::class, 'store']);
Route::put('/meetings/{id}', [App\Http\Controllers\MeetingController::class, 'update']);
Route::delete('/meetings/{id}', [App\Http\Controllers\MeetingController::class, 'destroy']);
