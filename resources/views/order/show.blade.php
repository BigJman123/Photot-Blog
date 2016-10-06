@extends('layouts.app')

@section('content')

<h2>Thank you for your purchase</h2>
<h4>Here is your receipt</h4>

<table class="table">
	<thead>
		<tr>
			<th>Item</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		@foreach($order->items as $item)
		<td>{{ $item['name'] }}</td>
		<td>{{ $item['price'] }}</td>
		<td>{{ $item['quantity'] }}</td>
		<td>{{ $item['price'] * $item['quantity'] }}</td>
		@endforeach
	</tbody>
</table>

@endsection