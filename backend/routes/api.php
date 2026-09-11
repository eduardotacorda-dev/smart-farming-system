<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::get('/health', function () {
        return response()->json([
            'status' => 'ok',
            'service' => 'smart-farming-api',
        ]);
    });

    Route::prefix('auth')->controller(AuthController::class)->group(function (): void {
        Route::post('/register', 'register');
        Route::post('/login', 'login');

        Route::middleware('auth:sanctum')->group(function (): void {
            Route::get('/me', 'me');
            Route::post('/logout', 'logout');
        });
    });
});
