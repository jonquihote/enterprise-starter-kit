<?php

use Illuminate\Support\Facades\Route;
use Enterprise\Aeon\Http\Controllers\AeonController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('aeons', AeonController::class)->names('aeon');
});
