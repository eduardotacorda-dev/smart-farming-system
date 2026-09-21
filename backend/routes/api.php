<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FarmController;
use App\Http\Controllers\Api\V1\FieldController;
use App\Http\Controllers\Api\V1\ZoneController;
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

    Route::middleware('auth:sanctum')->group(function (): void {
        Route::apiResource('farms', FarmController::class)->only(['index', 'store', 'show', 'update']);

        Route::prefix('farms/{farm}')->group(function (): void {
            Route::get('/fields', [FieldController::class, 'index']);
            Route::post('/fields', [FieldController::class, 'store']);
        });

        Route::apiResource('fields', FieldController::class)->only(['show', 'update']);

        Route::prefix('fields/{field}')->group(function (): void {
            Route::get('/zones', [ZoneController::class, 'index']);
            Route::post('/zones', [ZoneController::class, 'store']);
        });

        Route::apiResource('zones', ZoneController::class)->only(['show', 'update']);
    });
});
