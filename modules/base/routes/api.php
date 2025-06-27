<?php

use Enterprise\Base\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('bases', BaseController::class)->names('base');
});
