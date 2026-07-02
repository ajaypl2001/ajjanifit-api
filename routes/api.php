<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\GymController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

// Create Gyms
    Route::get('/gyms', [GymController::class, 'index']);
    Route::post('/gyms', [GymController::class, 'store']);
    Route::get('/gyms/{id}', [GymController::class, 'show']);
    Route::put('/gyms/{id}', [GymController::class, 'update']);
    Route::delete('/gyms/{id}', [GymController::class, 'destroy']);
});
