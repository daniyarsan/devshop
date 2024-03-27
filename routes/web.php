<?php

use Illuminate\Support\Facades\Route;


Route::get('/', \App\Http\Controllers\HomeController::class);
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login']);
