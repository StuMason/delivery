<?php

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

Route::post('/newsletter-signup', function () {
    //newsletter signup
    dd("store request('email') and send a little thank you");
});

Route::prefix('pages')->name('pages.')->group(function () {
    Route::get('/about', function () { return view('pages.about'); })->name('about');
    Route::get('/journal', function () { return view('pages.journal'); })->name('journal');
    Route::get('/jobs', function () { return view('pages.jobs'); })->name('jobs');
    Route::get('/feedback', function () { return view('pages.feedback'); })->name('feedback');
    Route::get('/help', function () { return view('pages.help'); })->name('help');
    Route::prefix('legal')->name('legal.')->group(function () {
        Route::get('/terms-and-conditions', function () { return view('pages.legal.terms-and-conditions'); })->name('terms');
        Route::get('/privacy', function () { return view('pages.legal.privacy'); })->name('privacy');
        Route::get('/cookies', function () { return view('pages.legal.cookies'); })->name('cookies');
    });
});

Auth::routes();

Route::post('/search', 'SearchController@search')->name('search.location');
Route::get('/search', 'SearchController@redirect')->name('search.redirect');

Route::prefix('location')->name('location.')->group(function () {
    Route::get('create', 'LocationController@create')->name('create');
});

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/restaurants', 'RestaurantController@index')->name('restaurants.index');
Route::get('/restaurants/create', 'RestaurantController@create')->name('restaurants.create');
Route::get('/restaurants/{restaurant}', 'RestaurantController@show')->name('restaurants.show');
Route::post('/restaurants', 'RestaurantController@store')->name('restaurants.store');
