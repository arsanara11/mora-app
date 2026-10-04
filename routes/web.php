<?php

use App\Http\Controllers\AtmosphereController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/atmosphere/{slug}', [AtmosphereController::class, 'show'])
    ->name('atmosphere.show');
