<?php

use Enterprise\Base\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('bases', BaseController::class)->names('base');
});
