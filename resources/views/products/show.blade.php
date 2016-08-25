@extends('layouts.app')

@section('content')

	@if($product->user_id == Auth::id())
		<div class="button-container pull-right">
			<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

			{{ Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) }}
			<button type="submit" class="btn btn-primary">Delete</button>
			{{ Form::close() }}
		</div>
	@endif

	<h1>{{ $product->title }}</h1>
	<p>{{$product->description}}</p>
	<h3>{{$product->price}}</h3>
	<h3>{{$product->quantity}}</h3>

	<a href="{{route("cart.store", $product->id)}}" id="addProduct" class="btn btn-primary">Buy One</a>

@stop

@section('footer')

<script>
	$('#addProduct').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);

		$.post($this.attr('href')).success(function(data) {
			alert(data);
		})
	})
</script>

@endsection