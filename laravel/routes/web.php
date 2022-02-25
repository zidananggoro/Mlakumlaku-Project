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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

Route::post('/checkout/{id}', 'CheckOutController@process')
        ->name('checkout_process')
        ->middleware(['auth','verified']);

Route::get('/checkout/{id}', 'CheckOutController@index')
        ->name('checkout')
        ->middleware(['auth','verified']);

Route::post('/checkout/create/{detail_id}', 'CheckOutController@create')
        ->name('checkout-create')
        ->middleware(['auth','verified']);

Route::get('/checkout/remove/{detail_id}', 'CheckOutController@remove')
        ->name('checkout-remove')
        ->middleware(['auth','verified']);

Route::get('/checkout/confirm/{id}', 'CheckOutController@success')
        ->name('checkout-success')
        ->middleware(['auth','verified']);



Route::prefix('admin')
        ->namespace('Admin')
        ->middleware(['auth','admin'])
        ->group(function(){
            Route::get('/','DashboardController@index')
                ->name('dashboard');

        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
        });


Auth::routes(['verify' => true]);






