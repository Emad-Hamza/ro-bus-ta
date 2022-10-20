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


Route::prefix('login')->group(function () {
    Route::name('login.')->group(function () {
        Route::post('/', [\App\Http\Controllers\Api\LoginController::class, 'login'])->name('');
    });
});


Route::prefix('seats')->group(function () {
    Route::name('seats.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\SeatController::class, 'index'])->name('index');
//        Route::get('/{id}', [\App\Http\Controllers\Api\SeatController::class, 'show'])->name('show');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('bookings')->group(function () {
        Route::name('bookings.')->group(function () {
            Route::post('/book', [\App\Http\Controllers\Api\BookingController::class, 'book'])->name('book');
        });
    });
});
