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
    return redirect('/user/index');
});

Auth::routes();

Route::prefix('user')->group(function() {
    Route::match(['get', 'post'], '/index', 'UserController@index')->name('user.index');
    Route::match(['get', 'post'], '/showProduct/{id}', 'UserController@showProduct')->where('id', '[0-9]+')->name('user.show_product');
    Route::match(['get', 'post'], '/searchProduct', 'UserController@searchProduct')->name('user.search_product');
    Route::match(['get', 'post'], '/sortProduct', 'UserController@sortProduct')->name('user.sort_product');
});

Route::prefix('admin')->group(function() {

    // Products

    Route::get('/listProduct', 'AdminController@listProduct')->name('admin.list_product');
    Route::match(['get', 'post'], '/showProduct/{id}', 'AdminController@showProduct')->where('id', '[0-9]+')->name('admin.show_product');
    Route::match(['get', 'post'], '/createProduct', 'AdminController@createProduct')->name('admin.create_product');
    Route::put('/editProduct/{id}', 'AdminController@editProduct')->where('id', '[0-9]+')->name('admin.edit_product');
    Route::put('/updateProduct/{id}', 'AdminController@updateProduct')->where('id', '[0-9]+')->name('admin.update_product');
    Route::delete('/destroyProduct/{id}', 'AdminController@destroyProduct')->where('id', '[0-9]+')->name('admin.destroy_product');
    Route::match(['get', 'post'], '/searchProduct', 'AdminController@searchProduct')->name('admin.search');

    // Prices

    Route::match(['get', 'post'], '/createPrice', 'AdminController@createPrice')->name('admin.create_price');
    Route::get('/listPrice', 'AdminController@listPrice')->name('admin.list_price');
    Route::put('/editPrice/{id}', 'AdminController@editPrice')->where('id', '[0-9]+')->name('admin.edit_price');
    Route::put('/updatePrice/{id}', 'AdminController@updatePrice')->where('id', '[0-9]+')->name('admin.update_price');
    Route::delete('/destroyPrice/{id}', 'AdminController@destroyPrice')->where('id', '[0-9]+')->name('admin.destroy_price');
});

