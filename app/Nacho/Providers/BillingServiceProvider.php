<?php

namespace Nacho\Providers;

use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider {
	public function register() {
		$this->app->bind('Nacho\Billing\BillingInterface', 'Nacho\Billing\StripeBilling');
	}
}