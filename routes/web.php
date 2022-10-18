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
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
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
        Route::prefix('bookings')->name('bookings/')->group(static function() {
            Route::get('/',                                             'BookingController@index')->name('index');
            Route::get('/create',                                       'BookingController@create')->name('create');
            Route::post('/',                                            'BookingController@store')->name('store');
            Route::get('/{booking}/edit',                               'BookingController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BookingController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{booking}',                                   'BookingController@update')->name('update');
            Route::delete('/{booking}',                                 'BookingController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UserController@index')->name('index');
            Route::get('/create',                                       'UserController@create')->name('create');
            Route::post('/',                                            'UserController@store')->name('store');
            Route::get('/{user}/edit',                                  'UserController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UserController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UserController@update')->name('update');
            Route::delete('/{user}',                                    'UserController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('stations')->name('stations/')->group(static function() {
            Route::get('/',                                             'StationController@index')->name('index');
            Route::get('/create',                                       'StationController@create')->name('create');
            Route::post('/',                                            'StationController@store')->name('store');
            Route::get('/{station}/edit',                               'StationController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StationController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{station}',                                   'StationController@update')->name('update');
            Route::delete('/{station}',                                 'StationController@destroy')->name('destroy');
        });
    });
});