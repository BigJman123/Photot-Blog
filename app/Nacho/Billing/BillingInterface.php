<?php

namespace Nacho\Billing;

interface BillingInterface {
	public function charge(array $data);
}