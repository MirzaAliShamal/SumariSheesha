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
Route::get('/products/{slug?}', 'HomeController@products')->name('products');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/booking-for-delivery', 'HomeController@bookingForDelivery')->name('booking.for.delivery');

Route::prefix('user')->name('user.')->namespace('User')->group(function() {
    route::get('add-cart/{qty?}', 'CartController@addCart')->name('add.cart');
    route::get('remove-cart', 'CartController@removeCart')->name('remove.cart');
    route::get('update-cart', 'CartController@updateCart')->name('update.cart');
    route::get('checkout-cart', 'CartController@checkoutCart')->name('checkout.cart')->middleware('auth');
});

Route::prefix('paypal')->name('paypal.')->group(function(){
    Route::get('paypalStatus', 'PaypalController@getPayPalStatus')->name('status') ;
    Route::post('details', 'PaypalController@price')->name('details');
});

// AJAX ROUTES
Route::get('/get-brands', 'HomeController@getBrands')->name('get.brands');

Route::middleware('auth')->group(function() {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function() {
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

        Route::prefix('flavour')->name('flavour.')->group(function() {
            Route::get('/list', 'FlavourController@list')->name('list');
            Route::get('/add', 'FlavourController@add')->name('add');
            Route::get('/status/{id?}', 'FlavourController@status')->name('status');
            Route::post('/save/{id?}', 'FlavourController@save')->name('save');
            Route::get('/delete/{id?}', 'FlavourController@delete')->name('delete');
            Route::get('/edit/{id?}', 'FlavourController@edit')->name('edit');
        });
        Route::prefix('color')->name('color.')->group(function() {
            Route::get('/list', 'ColorController@list')->name('list');
            Route::get('/add', 'ColorController@add')->name('add');
            Route::get('/status/{id?}', 'ColorController@status')->name('status');
            Route::post('/save/{id?}', 'ColorController@save')->name('save');
            Route::get('/delete/{id?}', 'ColorController@delete')->name('delete');
            Route::get('/edit/{id?}', 'ColorController@edit')->name('edit');
        });
        Route::prefix('category')->name('category.')->group(function() {
            Route::get('/list', 'CategoryController@list')->name('list');
            Route::get('/add', 'CategoryController@add')->name('add');
            Route::get('/status/{id?}', 'CategoryController@status')->name('status');
            Route::post('/save/{id?}', 'CategoryController@save')->name('save');
            Route::get('/delete/{id?}', 'CategoryController@delete')->name('delete');
            Route::get('/edit/{id?}', 'CategoryController@edit')->name('edit');
        });
        Route::prefix('product')->name('product.')->group(function() {
            Route::get('/list', 'ProductController@list')->name('list');
            Route::get('/add', 'ProductController@add')->name('add');
            Route::get('/status/{id?}', 'ProductController@status')->name('status');
            Route::post('/save/{id?}', 'ProductController@save')->name('save');
            Route::get('/delete/{id?}', 'ProductController@delete')->name('delete');
            Route::get('/edit/{id?}', 'ProductController@edit')->name('edit');
        });
        Route::prefix('brand')->name('brand.')->group(function() {
            Route::get('/list', 'BrandController@list')->name('list');
            Route::get('/add', 'BrandController@add')->name('add');
            Route::get('/status/{id?}', 'BrandController@status')->name('status');
            Route::post('/save/{id?}', 'BrandController@save')->name('save');
            Route::get('/delete/{id?}', 'BrandController@delete')->name('delete');
            Route::get('/edit/{id?}', 'BrandController@edit')->name('edit');
        });
        Route::prefix('brand-product')->name('brand_product.')->group(function() {
            Route::get('/list', 'BrandProductController@list')->name('list');
            Route::get('/add', 'BrandProductController@add')->name('add');
            Route::get('/status/{id?}', 'BrandProductController@status')->name('status');
            Route::post('/save/{id?}', 'BrandProductController@save')->name('save');
            Route::get('/delete/{id?}', 'BrandProductController@delete')->name('delete');
            Route::get('/edit/{id?}', 'BrandProductController@edit')->name('edit');
        });
    });
});
