<?php

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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('buses')->name('buses/')->group(static function() {
            Route::get('/',                                             'BusesController@index')->name('index');
            Route::get('/create',                                       'BusesController@create')->name('create');
            Route::post('/',                                            'BusesController@store')->name('store');
            Route::get('/{bu}/edit',                                    'BusesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BusesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{bu}',                                        'BusesController@update')->name('update');
            Route::delete('/{bu}',                                      'BusesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('seats')->name('seats/')->group(static function() {
            Route::get('/',                                             'SeatsController@index')->name('index');
            Route::get('/create',                                       'SeatsController@create')->name('create');
            Route::post('/',                                            'SeatsController@store')->name('store');
            Route::get('/{seat}/edit',                                  'SeatsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SeatsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{seat}',                                      'SeatsController@update')->name('update');
            Route::delete('/{seat}',                                    'SeatsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('stations')->name('stations/')->group(static function() {
            Route::get('/',                                             'StationsController@index')->name('index');
            Route::get('/create',                                       'StationsController@create')->name('create');
            Route::post('/',                                            'StationsController@store')->name('store');
            Route::get('/{station}/edit',                               'StationsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StationsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{station}',                                   'StationsController@update')->name('update');
            Route::delete('/{station}',                                 'StationsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('trips')->name('trips/')->group(static function() {
            Route::get('/',                                             'TripsController@index')->name('index');
            Route::get('/create',                                       'TripsController@create')->name('create');
            Route::post('/',                                            'TripsController@store')->name('store');
            Route::get('/{trip}/edit',                                  'TripsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TripsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{trip}',                                      'TripsController@update')->name('update');
            Route::delete('/{trip}',                                    'TripsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('stations-trips')->name('stations-trips/')->group(static function() {
            Route::get('/',                                             'StationsTripsController@index')->name('index');
            Route::get('/create',                                       'StationsTripsController@create')->name('create');
            Route::post('/',                                            'StationsTripsController@store')->name('store');
            Route::get('/{stationsTrip}/edit',                          'StationsTripsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StationsTripsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{stationsTrip}',                              'StationsTripsController@update')->name('update');
            Route::delete('/{stationsTrip}',                            'StationsTripsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('bookings')->name('bookings/')->group(static function() {
            Route::get('/',                                             'BookingsController@index')->name('index');
            Route::get('/create',                                       'BookingsController@create')->name('create');
            Route::post('/',                                            'BookingsController@store')->name('store');
            Route::get('/{booking}/edit',                               'BookingsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BookingsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{booking}',                                   'BookingsController@update')->name('update');
            Route::delete('/{booking}',                                 'BookingsController@destroy')->name('destroy');
        });
    });
});