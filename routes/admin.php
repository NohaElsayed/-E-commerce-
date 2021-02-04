<?php

use App\Http\Controllers\Admin\VendorController;
use App\Models\Vendor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
   Route::get('/','AdminController@login')->name('admin.index');
   Route::post('/login','AdminController@logindata')->name('admin.logindata');
   Route::get('/logout','AdminController@logout')->name('admin.logout');


   Route::group(['prefix' => '/','middleware'=>'access'], function () {
        Route::get('/dashboard','AdminController@index')->name('admin.dashboard');
        Route::get('/admin-profile/{id}','AdminController@edit_admin_profile')->name('admin.editprofile');
        Route::post('/update-admin-profile/{id}','AdminController@update_admin_profile')->name('admin.updateprofile');
        Route::get('/add-user','AdminController@show_add_user')->name('admin.showadduser');
        Route::post('/add-user','AdminController@add_user')->name('admin.adduser');
        Route::get('/manage-users','AdminController@manage_users')->name('admin.manageusers');
        Route::get('/delete-user/{id}','AdminController@delete_user')->name('admin.deleteuser');
        Route::get('/edit-user/{id}','AdminController@edit_user')->name('admin.edituser');
        Route::post('/edit-user/{id}','AdminController@update_user')->name('admin.updateuser');
        Route::get('/show-mailbox','AdminController@show_mailbox')->name('admin.showmailbox');

     /*========================================== Begin Category Routes============================================================== */
        Route::get('/add-category','CategoryController@add_category')->name('admin.addcategory');
        Route::post('/store-category','CategoryController@store_category')->name('admin.storecategory');
        Route::get('/manage-category','CategoryController@manage_category')->name('admin.managecategory');
        Route::get('/delete-category/{id}','CategoryController@delete_category')->name('admin.deletecategory');
        Route::get('/edit-category/{id}','CategoryController@edit_category')->name('admin.editcategory');
        Route::post('/edit-category/{id}','CategoryController@update_Category')->name('admin.updatecategory');
        Route::get('/show-product-category/{id}','CategoryController@show_product_category')->name('admin.showproductcategory');

   /*========================================== End Category Routes============================================================== */

 /*========================================== Begin Product Routes============================================================== */
        Route::get('/add-product','ProductController@add_product')->name('admin.addproduct');
        Route::get('/manage-product','ProductController@manage_product')->name('admin.manageproduct');
        Route::get('/show-product/{id}','ProductController@show_product')->name('admin.showproduct');
        Route::post('/store-product', 'ProductController@store_product')->name('admin.storeproduct');
        Route::get('/edit-product/{id}','ProductController@edit_product')->name('admin.editproduct');
        Route::post('/edit-product/{id}','ProductController@update_product')->name('admin.updateproduct');
        Route::get('/delete-product/{id}','ProductController@delete_product')->name('admin.deleteproduct');
        Route::post('/search-products','ProductController@search_products')->name('admin.searchproduct');
        Route::get('/product-details/{id}','ProductController@product_details' );
    /*========================================== End Product Routes============================================================== */


     /*========================================== Begin Vendor Routes============================================================== */
        Route::get('/Vendors/manage-vendors-products','VendorController@manage_vendors_products')->name('admin.managevendorsproducts');
        Route::get('/Vendors/show-vendors-products/{id}','VendorController@show_vendors_products')->name('admin.showvendorsproducts');
        Route::post('/Vendors/add-vendor-products','VendorController@add_vendor_products')->name('admin.addvendorproducts');
        Route::post('/Vendors/add-vendor','VendorController@add_vendor')->name('admin.addvendor');
        Route::get('/Vendor/edit-vendor/{id}','VendorController@edit_vendor')->name('admin.editvendor');
        Route::post('/Vendor/edit-vendor/{id}','VendorController@update_vendor')->name('admin.updatevendor');
        Route::get('/delete-vendor/{id}','VendorController@delete_vendor')->name('admin.deletevendor');
    /*========================================== End Vendor Routes============================================================== */

      /*========================================== Begin Post Routes============================================================== */
        Route::get('/add-post','PostController@add_post')->name('admin.addpost');
        Route::post('/store-post','PostController@store_post')->name('admin.storepost');
        Route::get('/manage-post','PostController@manage_post')->name('admin.managepost');
        Route::get('/edit-post/{id}','PostController@edit_post')->name('admin.editpost');
        Route::post('/edit-post/{id}','PostController@update_post')->name('admin.updatepost');
        Route::get('/delete-post/{id}','PostController@delete_post')->name('admin.deletepost');
        Route::get('/blog-category','PostController@blog_category')->name('admin.blogcategory');
        Route::post('/add-blog-category','PostController@add_blog_category')->name('admin.addnblogcategory');
      /*========================================== End Post Routes============================================================== */




});

});


