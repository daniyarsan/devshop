<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/* Main Routes */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/install/check-db', [HomeController::class, 'checkConnectDatabase']);


Route::get('/storage/images/{dir}/{method}/{size}/{file}', \App\Http\Controllers\ThumbnailController::class)
    ->where('method', 'crop|resize|fit')
    ->where('size', '\d+x\d+')
    ->where('file', '.+\.(png|jpg|gif|bmp|jpeg)$')
    ->name('thumbnail');


foreach (scandir($path = app_path('../src/Modules')) as $dir) {
    if (file_exists($filepath = "{$path}/{$dir}/Routes/web.php")) {
        require  $filepath;
    }
}
