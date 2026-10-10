<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeoController;

Route::get('/sitemap.xml', [SeoController::class, 'sitemap']);

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/doctrine', function () {
    return view('doctrine');
})->name('doctrine');

Route::get('/disciplines', function () {
    return view('disciplines');
})->name('disciplines');

Route::get('/engagements', function () {
    return view('engagements');
})->name('engagements');

Route::get('/archive', function () {
    return view('archive');
})->name('archive');

Route::get('/vault', function () {
    return view('vault');
})->name('vault');
