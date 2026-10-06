<?php

use App\Http\Controllers\AtmosphereController;
use App\Http\Controllers\CreateAtmosphereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SavedAtmosphereController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/create', [CreateAtmosphereController::class, 'create'])
    ->name('atmosphere.create');

Route::post('/create', [CreateAtmosphereController::class, 'store'])
    ->name('atmosphere.store');

Route::get('/atmosphere/{slug}', [AtmosphereController::class, 'show'])
    ->name('atmosphere.show');

Route::post('/atmosphere/{slug}/save', [SavedAtmosphereController::class, 'toggle'])
    ->name('atmosphere.save');