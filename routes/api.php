<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('v1.')->group(function () {
    Route::get('/', function () {
        return response()->json(['version' => '1.0', 'health' => 'ok']);
    })->name('index');
    Route::prefix('restaurants')->name('restaurants.')->group(function () {
        Route::get('/', 'Api\V1\RestaurantApiController@index')->name('index');
        Route::post('/', 'Api\V1\RestaurantApiController@store')->name('store');
        Route::get('/{id}', 'Api\V1\RestaurantApiController@show')->name('show');
        // Route::put('/{id}', 'Api\V1\RestaurantApiController@update')->name('update');
        // Route::delete('/{id}', 'Api\V1\RestaurantApiController@destroy')->name('destroy');
    });
});
