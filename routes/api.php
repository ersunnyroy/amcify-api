<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use authcontroller;
use App\Http\Controllers\AuthController;


Route::middleware('api')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);
    // Add other protected routes here...
});
