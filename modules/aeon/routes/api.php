<?php

use Enterprise\Aeon\Http\Controllers\AeonController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('aeons', AeonController::class)->names('aeon');
});
