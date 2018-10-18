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
Route::get('/not-allow','Controller@not_allow')->name('not-allow');
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

	Route::group(['prefix' => 'product'], function(){
		Route::get('/', 'Admin\ProductController@index')->name('product.show');
		Route::get('add', 'Admin\ProductController@create')->name('product.add');
		Route::post('add', 'Admin\ProductController@store')->name('product.store');
		Route::get('edit/{id}', 'Admin\ProductController@edit')->name('product.edit');
		Route::post('edit/{id}', 'Admin\ProductController@update')->name('product.update');
		Route::get('delete/{id}', 'Admin\ProductController@destroy')->name('product.delete');
	});

	Route::group(['prefix' => 'dog-category',], function (){

	    Route::get('', 'Admin\DogCategoryController@index')->name('dog_category.index');
	    Route::get('add', 'Admin\DogCategoryController@add')->name('dog_category.add');
	    Route::post('add', 'Admin\DogCategoryController@store')->name('dog_category.store');
	    Route::get('/edit/{id}','Admin\DogCategoryController@edit')->name('dog_category.edit');
	    Route::put('/edit/{id}','Admin\DogCategoryController@update')->name('dog_category.update');
	    Route::delete('delete/{id}','Admin\DogCategoryController@delete')->name('dog_category.delete');
	});

	Route::group(['prefix' => 'dog',], function (){

	    Route::get('', 'Admin\DogController@index')->name('dog.index');
	    Route::get('add', 'Admin\DogController@add')->name('dog.add');
	    Route::post('add', 'Admin\DogController@store')->name('dog.store');
	    Route::get('/edit/{id}','Admin\DogController@edit')->name('dog.edit');
	    Route::put('/edit/{id}','Admin\DogController@update')->name('dog.update');
	    Route::delete('delete/{id}','Admin\DogCategoryController@delete')->name('dog.delete');
	});
	
});
 