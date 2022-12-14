<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ITHilbert\CookieDisclaimer\Http\Controllers\CookieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::middleware(['api'])->group(function () {
    Route::post('load-scripte-after-cookies-allow', [CookieController::class, 'loadScripteAfterCookiesAllow'])->name('load.scripte.after.cookies.allow');
    Route::post('load-cookie-infos', [CookieController::class, 'loadCookieInfos'])->name('load.cookie.infos');

    Route::post('cookies-allow-stat', [CookieController::class, 'cookiesAllowStat'])->name('cookies.allow.stat');
});
