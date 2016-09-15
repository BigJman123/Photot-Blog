@extends('layouts.app')

@section('content')

<h1>Buy For $10</h1>

{{ Form::open(['id' => 'billing-form', 'route' => ['order.store']]) }}

	<div class="form-row">
		<label>
			<span>Address:</span>
			<input type="text" name="address" required>
		</label>
	</div>

	<div class="form-row">
		<label>
			<span>State:</span>
			<select name="state">
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>	
		</label>
	</div>

	<div class="form-row">
		<label>
			<span>Zip Code:</span>
			<input type="" name="zip" required>
		</label>
	</div>

	<div class="form-row">
		<label>
			<span>Card Number:</span>
			<input type="text" data-stripe="number" value="4242424242424242" required>
		</label>
	</div>

	<div class="form-row">
		<label>
			<span>CVC:</span>
			<input type="text" data-stripe="cvc" required>
		</label>
	</div>

	<div class="form-row">
		<label>
			<span>Expiration Date:</span>
			{{ Form::selectMonth(null, null, ['data-stripe' => 'exp-month']) }}
			{{ Form::selectYear(null, date('Y'), date('Y') + 10, null, ['data-stripe' => 'exp-year']) }}
		</label>
	</div>

	<div class="form-row">
		<label>
			<span>Email Address:</span>
			<input type="email" id="email" name="email" required>
		</label>
	</div>

	<div class="form-row">
		{{ Form::submit('Buy Now') }}
	</div>

	<div class="payment-errors"></div>

{{ Form::close() }}



@stop

@section('footer')

	<script src="/js/billing.js"></script>

@stop