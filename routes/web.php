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
Route::get('/not-allow','Controller@not_allow')->name('not-allow');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role']], function(){
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
	    Route::delete('delete/{id}','Admin\DogController@delete')->name('dog.delete');
	});

	Route::group(['prefix' => 'order',], function (){

	    Route::get('', 'Admin\OrderController@index')->name('order.index');
	});

	Route::group(['prefix' => 'user',], function (){

	    Route::get('', 'Admin\UserController@index')->name('user.index');
	    Route::get('add', 'Admin\UserController@add')->name('user.add');
	    Route::post('add', 'Admin\UserController@store')->name('user.store');
	    Route::get('/edit/{id}','Admin\UserController@edit')->name('user.edit');
	    Route::put('/edit/{id}','Admin\UserController@update')->name('user.update');
	    Route::delete('delete/{id}','Admin\UserController@delete')->name('user.delete');
	});

	Route::group(['prefix' => 'post',], function (){

	    Route::get('', 'Admin\PostController@index')->name('post.index');
	    Route::get('add', 'Admin\PostController@add')->name('post.add');
	    Route::post('add', 'Admin\PostController@store')->name('post.store');
	    Route::get('/edit/{id}','Admin\PostController@edit')->name('post.edit');
	    Route::put('/edit/{id}','Admin\PostController@update')->name('post.update');
	    Route::delete('delete/{id}','Admin\PostController@delete')->name('post.delete');
	    Route::post('change-status/{id}','Admin\PostController@change_status')->name('post.change_status');
	});

	Route::group(['prefix' => 'site-config',], function (){

	    Route::get('', 'Admin\SiteConfigController@index')->name('site_config.index');
	    Route::get('add', 'Admin\SiteConfigController@add')->name('site_config.add');
	    Route::post('add', 'Admin\SiteConfigController@store')->name('site_config.store');
	    Route::get('/edit/{id}','Admin\SiteConfigController@edit')->name('site_config.edit');
	    Route::put('/edit/{id}','Admin\SiteConfigController@update')->name('site_config.update');
	    Route::delete('delete/{id}','Admin\SiteConfigController@delete')->name('site_config.delete');
	});
	
});

Route::group(['prefix' => '/'], function(){
	Route::get('/', 'Client\HomeController@index')->name('home.index');
	Route::get('dog_home','Client\HomeController@dog_home')->name('home.dog_home');

	Route::group(['prefix' => 'dog-category'], function(){
		Route::get('dog-category', 'Client\HomeController@dog_category')->name('home.dog-category');
	});
	Route::group(['prefix' => 'dog'], function(){
		Route::get('list', 'Client\HomeController@list')->name('home.list');
		Route::get('dogs/{id}', 'Client\HomeController@dog')->name('home.dog');
		Route::get('detail_dog/{id}','Client\HomeController@detail_dog')->name('home.detail_dog');
	});
	Route::group(['prefix' => 'product-category'], function(){
		Route::get('product-category', 'Client\HomeController@product_category')->name('home.product-category');
	});
	Route::group(['prefix' => 'product'], function(){
		Route::get('product/{id}', 'Client\HomeController@product')->name('home.product');
		Route::get('detail_product/{id}','Client\HomeController@detail_product')->name('home.detail_product');
	});
	Route::group(['prefix' => 'blog'], function(){
		Route::get('','Client\HomeController@blog')->name('home.blog');
		Route::get('detail_blog/{id}','Client\HomeController@detail_blog')->name('home.detail_blog');
	});
});
Route::get('add-to-dog/{id}','Client\HomeController@addtocart')->name('home.cart');
Route::get('add-to-product/{id}','Client\HomeController@addtoproduct')->name('home.productcart');
Route::get('del-cart/{id}','Client\HomeController@delitem')->name('home.del');
Route::get('checkout','Client\HomeController@getcheckout')->name('home.checkout');
Route::get('viewcart','Client\HomeController@viewcart')->name('home.viewcart');
Route::get('viewproduct','Client\HomeController@viewproduct');


Route::get('/editPass', 'Auth\ChangePasswordController@edit')->name('editPass');
Route::put('/updatePass', 'Auth\ChangePasswordController@update')->name('updatePass');
 
Auth::routes();

Route::group(['prefix' => '', 'middleware' => ['role']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});
