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

Route::get('product', 'ProductController@listProduct')->name('list_product');
Route::get('product/detail/{product_id}', 'ProductController@getDetailProduct');
Route::get('clear-cart', 'CartController@clearCart');
Route::get('checkout', 'CartController@checkOut');

Route::match(['get', 'post'], '/cart', 'CartController@cart')->name('cart');

Auth::routes();

Route::get('admincp/login', ['as' => 'getLogin', 'uses' => 'Admin\AdminLoginController@getLogin']);
Route::post('admincp/login', ['as' => 'postLogin', 'uses' => 'Admin\AdminLoginController@postLogin']);
Route::get('admincp/register', ['as' => 'postRegister', 'uses' => 'Admin\AdminLoginController@getRegister']);
Route::get('admincp/logout', ['as' => 'getLogout', 'uses' => 'Admin\AdminLoginController@getLogout']);


Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
    Route::get('/', function() {
        return view('admin.home');
    });
    Route::resource('category', 'AdminCategoryController');
    Route::resource('product', 'AdminProductController');
    Route::post('uploadImg', 'UploadImagesController@postImages');
});





