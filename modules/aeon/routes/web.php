<?php

use Illuminate\Support\Facades\Route;
use Enterprise\Aeon\Http\Controllers\AeonController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('aeons', AeonController::class)->names('aeon');
});
