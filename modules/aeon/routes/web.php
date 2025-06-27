<?php

use Enterprise\Aeon\Http\Controllers\AeonController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('aeons', AeonController::class)->names('aeon');
});
