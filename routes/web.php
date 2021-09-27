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

require __DIR__.'/auth.php';

Route::get('/', 'HomeController@home')->name('home');
Route::get('/products', 'HomeController@products')->name('products');

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::prefix('flavour')->name('flavour.')->group(function() {
        Route::get('/list', 'FlavourController@list')->name('list');
        Route::get('/add', 'FlavourController@add')->name('add');
        Route::get('/status/{id?}', 'FlavourController@status')->name('status');
        Route::post('/save/{id?}', 'FlavourController@save')->name('save');
    });
});

