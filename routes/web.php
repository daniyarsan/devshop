<?php

use Illuminate\Support\Facades\Route;


Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'signIn')->name('signIn');
    Route::get('/registration', 'registration')->name('registration');
    Route::post('/signup', 'signup')->name('signup');
    Route::delete('/logout', 'logout')->name('logout');
});
