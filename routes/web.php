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
Route::get('/products/{category?}/{subcategory?}', 'HomeController@products')->name('products');
Route::get('/product/{slug?}', 'HomeController@productDetail')->name('product.detail');
Route::get('/blog/{slug?}', 'HomeController@blog')->name('blog');
Route::get('/category/{slug?}', 'HomeController@blogCategory')->name('blog.category');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/contact-save', 'HomeController@contactSave')->name('contact.save');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/checkout', 'HomeController@checkout')->name('checkout')->middleware('auth');
Route::get('/booking-for-delivery', 'HomeController@bookingForDelivery')->name('booking.for.delivery');

Route::prefix('user')->name('user.')->namespace('User')->group(function() {

    route::get('add-cart/{qty?}', 'CartController@addCart')->name('add.cart');
    route::get('remove-cart', 'CartController@removeCart')->name('remove.cart');
    route::get('update-cart', 'CartController@updateCart')->name('update.cart');
    // route::get('checkout-cart', 'CartController@checkoutCart')->name('checkout.cart')->middleware('auth');
    Route::prefix('booking')->name('booking.')->group(function() {
        route::get('add', 'BookingController@addBooking')->name('add');
        route::get('remove', 'BookingController@remove')->name('remove');
        route::get('checkout', 'BookingController@checkout')->name('checkout')->middleware('auth');

    });
    Route::prefix('dashboard')->name('dashboard.')->group(function() {
        route::get('order' ,'DashboardController@order')->name('order');
        route::get('booking' ,'DashboardController@booking')->name('booking');
        route::get('profile' ,'DashboardController@profile')->name('profile');
        route::post('profile/image' ,'DashboardController@image')->name('profile.image');
        route::post('profile/bio' ,'DashboardController@bio')->name('profile.bio');
        route::post('profile/contact' ,'DashboardController@contact')->name('profile.contact');
        route::post('profile/password' ,'DashboardController@password')->name('profile.password');
    });

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

        Route::prefix('profile')->name('profile.')->group(function() {
            Route::get('view', 'ProfileController@view')->name('view');
            Route::post('save', 'ProfileController@save')->name('save');
            Route::post('image', 'ProfileController@image')->name('image');
            Route::post('password', 'ProfileController@password')->name('password');
        });

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

        Route::prefix('sub-category')->name('sub.category.')->group(function() {
            Route::get('/list', 'SubCategoryController@list')->name('list');
            Route::get('/add', 'SubCategoryController@add')->name('add');
            Route::post('/save/{id?}', 'SubCategoryController@save')->name('save');
            Route::get('/delete/{id?}', 'SubCategoryController@delete')->name('delete');
            Route::get('/edit/{id?}', 'SubCategoryController@edit')->name('edit');
        });

        Route::prefix('product')->name('product.')->group(function() {
            Route::get('/list', 'ProductController@list')->name('list');
            Route::get('/add', 'ProductController@add')->name('add');
            Route::post('/sub', 'ProductController@sub')->name('sub');
            Route::get('/status/{id?}', 'ProductController@status')->name('status');
            Route::get('/featured-status/{id?}', 'ProductController@featuredStatus')->name('featured.status');
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

        Route::prefix('order')->name('order.')->group(function() {
            Route::get('/list', 'OrderController@list')->name('list');
            Route::get('/status/{id?}', 'OrderController@status')->name('status');
            Route::get('/view/{id?}', 'OrderController@view')->name('view');
        });

        Route::prefix('booking')->name('booking.')->group(function() {
            Route::get('/list', 'BookingController@list')->name('list');
            Route::get('/status/{id?}', 'BookingController@status')->name('status');
            Route::get('/view/{id?}', 'BookingController@view')->name('view');
        });

        Route::prefix('earning')->name('earning.')->group(function() {
            Route::get('/list', 'EarningController@list')->name('list');
            Route::get('/view/{id?}/{type?}', 'EarningController@view')->name('view');
        });

        Route::prefix('brand-product')->name('brand_product.')->group(function() {
            Route::get('/list', 'BrandProductController@list')->name('list');
            Route::get('/add', 'BrandProductController@add')->name('add');
            Route::get('/status/{id?}', 'BrandProductController@status')->name('status');
            Route::post('/save/{id?}', 'BrandProductController@save')->name('save');
            Route::get('/delete/{id?}', 'BrandProductController@delete')->name('delete');
            Route::get('/edit/{id?}', 'BrandProductController@edit')->name('edit');
        });

        Route::prefix('blog-category')->name('blog.category.')->group(function() {
            Route::get('/list', 'BlogCategoryController@list')->name('list');
            Route::get('/add', 'BlogCategoryController@add')->name('add');
            Route::get('/status/{id?}', 'BlogCategoryController@status')->name('status');
            Route::post('/save/{id?}', 'BlogCategoryController@save')->name('save');
            Route::get('/delete/{id?}', 'BlogCategoryController@delete')->name('delete');
            Route::get('/edit/{id?}', 'BlogCategoryController@edit')->name('edit');
        });

        Route::prefix('blog-post')->name('blog.post.')->group(function() {
            Route::get('/list', 'BlogPostController@list')->name('list');
            Route::get('/add', 'BlogPostController@add')->name('add');
            Route::get('/status/{id?}', 'BlogPostController@status')->name('status');
            Route::post('/save/{id?}', 'BlogPostController@save')->name('save');
            Route::get('/delete/{id?}', 'BlogPostController@delete')->name('delete');
            Route::get('/edit/{id?}', 'BlogPostController@edit')->name('edit');
        });

        Route::prefix('cms')->name('cms.')->group(function() {
            Route::post('/save', 'SettingController@save')->name('save');
            Route::get('/general', 'SettingController@general')->name('general');
            Route::get('/home', 'SettingController@home')->name('home');
        });
    });
});
