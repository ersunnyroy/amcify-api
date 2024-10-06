<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
// Routes under api auth
Route::middleware(['auth:sanctum', 'super_admin'])->group(function () {
    // Route::post('/companies', [CompanyController::class, 'create']);
    // Route::post('/logout', [AuthController::class, 'logout']);
});
