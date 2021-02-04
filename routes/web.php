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







 /*========================================== Begin Site Routes============================================================== */

 Route::group(['prefix' => '/','namespace'=>'frontend'], function () {
    Route::group(
        ['prefix' => LaravelLocalization::setLocale() ], function(){

        Route::post('registeration','CustomerController@register_customer')->name('register-customer');
        Route::post('sign-in','CustomerController@sign_in_customer')->name('signin-customer');
        Route::get('login', 'SiteController@login')->name('login');

        });
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
            Route::get('logout','CustomerController@logout_customer')->name('logout-customer');
            Route::get('', 'SiteController@index')->name('index');
            Route::get('shop', 'SiteController@shop')->name('shop');
            Route::get('products-by-category/{id}','SiteController@view_productsby_category')->name('view-products-by-category');
            Route::get('shoppingCart', 'SiteController@shopping_cart')->name('shopping-cart');
            Route::get('register', 'SiteController@register')->name('register');
            Route::get('product', 'SiteController@product')->name('product');
            Route::get('signup','SiteController@signup')->name('signup');
            Route::get('faq', 'SiteController@faq')->name('faq');
            Route::get('contact', 'SiteController@contact')->name('contact');
            Route::get('checkOut', 'SiteController@check_out')->name('check-out');
            Route::post('show-products','SiteController@show_products')->name('show-products');
            Route::get('show-products-details/{id}','SiteController@show_details')->name('show-details');
            Route::get('/products-slider','SiteController@product_slider')->name('products-slider');
            Route::get('/blog','SiteController@blog')->name('blog');
            Route::post('/blog-search','SiteController@blog_search')->name('blog-search');
            Route::get('/post-details/{id}','SiteController@post_details')->name('post-details');

/*========================================== End Site Routes============================================================== */


/*========================================== Begin Customer Routes============================================================== */

           Route::get('send-message/{id}','CustomerController@sending_message')->name('send-message');
           Route::post('send-message','CustomerController@store_message')->name('store-message');
/*========================================== End Customer Routes============================================================== */



        });




    });



