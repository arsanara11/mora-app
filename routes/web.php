<?php

use App\Http\Controllers\AtmosphereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavedAtmosphereController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/atmosphere/{slug}', [AtmosphereController::class, 'show'])
    ->name('atmosphere.show');

Route::post('/atmosphere/{slug}/save', [SavedAtmosphereController::class, 'toggle'])
    ->name('atmosphere.save');