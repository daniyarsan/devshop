<?php

use Illuminate\Support\Facades\Route;

Route::as('user.')->group(function() {
    Route::controller(\Modules\User\Controllers\LoginController::class)->group(function () {
        Route::get('/login', 'page')->name('login');
        Route::post('/login', 'handle')->name('signIn');
        Route::delete('/logout', 'logout')->name('logout');
    });

    Route::controller(\Modules\User\Controllers\RegistrationController::class)->group(function () {
        Route::get('/registration', 'page')->name('registration');
        Route::post('/signup', 'handle')->name('signup');
    });

    Route::controller(\Modules\User\Controllers\ForgotController::class)->group(function () {
        Route::get('/forgot-password', 'page')->middleware('guest')->name('forgot');
        Route::post('/forgot-password', 'handle')->middleware('guest')->name('forgotPassword');
    });
    Route::controller(\Modules\User\Controllers\ResetController::class)->group(function () {
        Route::get('/reset-password/{token}', 'reset')->middleware('guest')->name('reset');
        Route::post('/reset-password', 'resetPassword')->middleware('guest')->name('resetPassword');
    });

});
