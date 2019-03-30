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

Route::get('/', 'PagesController@index')->name('index');
Route::get('/product/{id}', 'PagesController@single')->name('product.single');
Route::post('/cart/add', 'ShopController@addToCart')->name('cart.add');
Route::get('/cart/r_add/{id}', 'ShopController@rapid_add')->name('cart.r_add');
Route::get('/cart/add', 'PagesController@not_get');
Route::get('/cart', 'ShopController@index')->name('cart');
Route::get('/cart/checkout', 'CheckoutController@index')->name('cart.checkout');
Route::get('/cart/delete/{id}', 'ShopController@delete_item')->name('cart.delete');
Route::get('/cart/inc/{id}/{qty}', 'ShopController@inc')->name('cart.inc');
Route::get('/cart/dec/{id}/{qty}', 'ShopController@dec')->name('cart.dec');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
