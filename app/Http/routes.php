<?php

Route::auth();
Route::get('/', 'HomeController@index');
Route::resource('posts', 'PostsController');
Route::resource('products', 'ProductsController');
Route::post('cart/{product_id}', ['as' => 'cart.store', 'uses' => 'CartController@store']);
// Route::resource('cart', 'CartController');
// Route::get('/posts/{id}/edit', 'PostsController@edit');

Route::get('addProduct', function() {
	Cart::add(1, "Taco", 100.00, 1, []);
	return "added";
});

Route::get('whatInCart', function() {
	dd(Cart::getContent());
});