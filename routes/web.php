<?php

use Illuminate\Support\Facades\Route;

Route::prefix('translation-manager')->group(function () {
    Route::get('/', function () {
        return view('tm::dashboard');
    });
});
