<?php

use ATStudio\TranslationManager\Controllers\ManagerController;
use ATStudio\TranslationManager\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->prefix('translation-manager')->group(function () {
    Route::view('/', 'tm::manager');
    Route::get('/all', [ManagerController::class, 'index']);
    Route::post('/scan', [ManagerController::class, 'store']);
    Route::put('/save', [ManagerController::class, 'update']);
    Route::get('/counters', [ManagerController::class, 'counters']);

    Route::get('/menu', [MenuController::class, 'index']);
});
