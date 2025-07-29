<?php

use App\Http\Controllers\Api\V1\Auth\SessionController;
use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\ServiceController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('/login', [SessionController::class, 'login']);
    Route::post('/register', [SessionController::class, 'register']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [SessionController::class, 'logout']);
        // Customer routes
        Route::get('/services', [ServiceController::class, 'index']);
        Route::post('/booking', [BookingController::class, 'store']);
        Route::get('/booking', [BookingController::class, 'index']);
        Route::middleware(['admin'])->group(function () {
            Route::apiResource('services', ServiceController::class);
            Route::get('admin/booking', [BookingController::class, 'index']);
        });
    });
});
