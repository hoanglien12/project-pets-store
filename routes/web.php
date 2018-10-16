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
    return view('admin.layouts.home');
});

Route::group(['prefix' => 'admin'], function(){
	Route::get('', 'Admin\ProductCategoryController@admin')->name('indexAdmin');
	Route::group(['prefix' => 'product-category'], function(){
		Route::get('/', 'Admin\ProductCategoryController@index')->name('product_category.show');
		Route::get('add', 'Admin\ProductCategoryController@create')->name('product_category.add');
		Route::post('add', 'Admin\ProductCategoryController@store')->name('product_category.store');
		Route::get('edit/{id}', 'Admin\ProductCategoryController@edit')->name('product_category.edit');
		Route::post('edit/{id}', 'Admin\ProductCategoryController@update')->name('product_category.update');
		Route::get('delete/{id}', 'Admin\ProductCategoryController@destroy')->name('product_category.delete');
	});
});
 