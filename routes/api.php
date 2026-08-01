<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);

    Route::prefix('vendors')->group(function () {
        Route::post('/', [VendorController::class, 'store']);
        Route::get('/', [VendorController::class, 'index']);
        Route::get('/{vendor}', [VendorController::class, 'show']);
        Route::put('/{vendor}', [VendorController::class, 'update']);

        Route::patch('/{vendor}/activate', [VendorController::class, 'activate']);
        Route::patch('/{vendor}/deactivate', [VendorController::class, 'deactivate']);
    });
});
