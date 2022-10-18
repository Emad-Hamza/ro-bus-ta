<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('seats')->group(function () {
    Route::name('seats.')->group(function() {
        Route::get('/', [\App\Http\Controllers\API\BadgeController::class, 'index'])->name('index');
        Route::get('/{id}', [\App\Http\Controllers\API\BadgeController::class, 'show'])->name('show');
    });
});


