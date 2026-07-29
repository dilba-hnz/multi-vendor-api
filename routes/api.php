<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserController::class, 'logout']);

    Route::prefix('vendor')->group(function () {
        Route::post('register', [VendorController::class, 'store']);
    });
});
