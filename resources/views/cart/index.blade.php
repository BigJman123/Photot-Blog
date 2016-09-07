@extends('layouts.app')

@section('content')

	@if(count($items) > 0)
		<table class="table">
			<thead>
				<tr>
					<th>Item</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr>
						<td>{{$item["name"]}}</td>
						<td>{{$item["quantity"]}}</td>
						<td>{{$item["price"]}}</td>
						<td>${{number_format($item["quantity"] * $item["price"], 2)}}</td>
					</tr>
				@endforeach
				 	<tr>
						<td></td>
						<td></td>
						<td class="text-right">Total:</td>
						<td>${{number_format(Cart::getTotal())}}</td>
					</tr>
			</tbody>
		</table>

		<div class="pull-right">
			{{ Form::open(['route' => ['cart.destroy'], 'method' => 'delete']) }}
				<button type="submit" class="btn btn-primary">Clear Cart</button>
			{{ Form::close() }}

			<button type="submit" class="btn btn-primary">Checkout</button>
		</div>

	@else

		<h2>Your cart is empty</h2>

	@endif
@stop