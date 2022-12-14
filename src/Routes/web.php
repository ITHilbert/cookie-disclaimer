<?php

use ITHilbert\CookieDisclaimer\Http\Controllers\CookieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::any('cookie-richtlinie', [CookieController::class, 'cookieRichtlinie'])->name('cookie.richtlinie');
    Route::any('cookie-statistik', [CookieController::class, 'cookieStatistik'])->name('cookie.statistik');
});


