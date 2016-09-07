<?php

Route::auth();
Route::get('/', 'HomeController@index');
Route::resource('posts', 'PostsController');
Route::resource('products', 'ProductsController');
Route::post('cart/{product_id}', ['as' => 'cart.store', 'uses' => 'CartController@store']);
Route::delete('cart', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::resource('cart', 'CartController', ['except' => ['store', 'destroy']]);
// Route::get('/posts/{id}/edit', 'PostsController@edit');