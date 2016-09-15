<?php

use Illuminate\Http\Request;
use App\User;

Route::auth();
Route::get('/', 'HomeController@index');
Route::resource('posts', 'PostsController');
Route::resource('products', 'ProductsController');
Route::post('cart/{product_id}', ['as' => 'cart.store', 'uses' => 'CartController@store']);
Route::delete('cart', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
Route::resource('cart', 'CartController', ['except' => ['store', 'destroy']]);
Route::get('/posts/{id}/edit', 'PostsController@edit');
Route::get('buy', function()
{
	return view('stripe.buy');
});
Route::post('buy', function(Request $request)
{
	$billing = App::make('Nacho\Billing\BillingInterface');

	try
	{
		$customerId = $billing->charge([
			'email' => $request->get('email'),
			'token' => $request->get('stripe-token')
		]);

		$user = User::first();
		$user->billing_id = $customerId;
		$user->save();
	}

	catch(Exception $e)
	{
		return Redirect::refresh()->withFlashMessage($e->getMessage());
	}

	return 'Charge was successful';
});