<?php

use Enterprise\Base\Http\Controllers\DashboardController;
use Enterprise\Base\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth'],
], function (): void {
    Route::group([
        'middleware' => ['verified'],
    ], function (): void {
        //
    });

    Route::get('dashboard', DashboardController::class)->name('screens.dashboard');
});

Route::group([
    'middleware' => ['guest'],
], function (): void {
    Route::get('session/create', [SessionController::class, 'create'])->name('session.create');
    Route::post('session', [SessionController::class, 'store'])->name('session.store');
});
