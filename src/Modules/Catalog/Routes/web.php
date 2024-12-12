<?php

use Illuminate\Support\Facades\Route;
use Modules\Catalog\Controllers\CatalogController;

Route::prefix('catalog')->as('catalog.')->group(function() {
    Route::controller(CatalogController::class)->group(function () {
        Route::get('/{category:slug?}', 'index')->name('index');
    });
});
