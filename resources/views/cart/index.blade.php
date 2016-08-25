@extends('layout.app')

@section('content')

	<table class="table">
		<thead>
			<tr>
				<th>Item</th>
				<th>Price</th>
				<th>Qty</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $item)
				<tr>
					<td>{{$item["name"]}}</td>
					<td>{{$item["price"]}}</td>
					<td>{{$item["quantity"]}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop