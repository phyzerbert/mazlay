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

Route::get('lang/{locale}', 'IndexController@lang')->name('lang');

Route::get('/', 'IndexController@index')->name('index');

// Auth::routes();

Route::get('login335', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/cart', 'IndexController@cart')->name('cart');
Route::post('/add_to_cart', 'IndexController@add_to_cart')->name('add_to_cart');

Route::get('/get_cart', 'IndexController@get_cart')->name('get_cart');
Route::post('/save_cart', 'IndexController@save_cart')->name('save_cart');
Route::get('/cart/remove_item/{id}', 'IndexController@remove_cart_item')->name('remove_cart_item');


Route::get('/input_customer', 'IndexController@input_customer')->name('input_customer');
Route::post('/save_customer', 'IndexController@save_customer')->name('save_customer');

Route::get('/checkout', 'IndexController@checkout')->name('checkout');

Route::post('/place_order', 'IndexController@place_order')->name('place_order');

// ******** Admin Dashboard **********
Route::get('product/index', 'ProductController@index')->name('admin.product');
Route::post('product/create', 'ProductController@create')->name('product.create');
Route::post('product/edit', 'ProductController@edit')->name('product.edit');
Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');



Route::get('sale/index', 'HomeController@sales')->name('admin.sale');
Route::get('sale/delete/{id}', 'HomeController@delete_sale')->name('sale.delete');

Route::post('/get_sale_products', 'HomeController@get_sale_products')->name('get_sale_products');

Route::get('setting/index', 'SettingController@index')->name('setting.index');
Route::post('setting/update', 'SettingController@update')->name('setting.update');

Route::get('sales/export', 'HomeController@export')->name('sales.export');
