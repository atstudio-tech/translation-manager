<?php

use ATStudio\TranslationManager\Controllers\ManagerController;
use ATStudio\TranslationManager\Livewire\ListTranslations;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->prefix('translation-manager')->group(function () {
    Route::get('/', ListTranslations::class);

    Route::put('/save', [ManagerController::class, 'update'])->name('tm.update');
});
