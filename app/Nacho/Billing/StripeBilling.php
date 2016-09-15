<?php

namespace Nacho\Billing;

use Stripe\Charge;
use Stripe\Customer;
use Stripe\Error\Card;
use Stripe\Error\InvalidRequest;
use Stripe\Stripe;

class StripeBilling implements BillingInterface {
	public function __construct()
	{
		Stripe::setApiKey(config('stripe.secret_key'));
	}

	public function charge(array $data) 
	{
		try
		{
			$customer = Customer::create([
				'card'        => $data['token'],
				'description' => $data['email'],
			]);

			Charge::create([
				'customer'    => $customer->id,
				'amount'      => 1000, //$10
				'currency'    => 'usd',
			]);

			return $customer->id;
		}

		catch(InvalidRequest $e)
		{
			throw new \Exception($e->getMessage());
		} 

		catch(Card $e) 
		{
			throw new \Exception($e->getMessage());
		}
	}
}