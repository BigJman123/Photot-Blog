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
	<div class="trix-content">

		{!! $product->description !!}

	</div>
	<h3>{{$product->price}}</h3>
	<h3 id="quantity">{{$product->quantity}}</h3>

	<a href="{{route("cart.store", $product->id)}}" id="addProduct" class="btn btn-primary">Buy One</a>

@stop

@section('footer')

<script>
	$('#addProduct').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);

		$.post($this.attr('href'))
		.success(function(data) {
			swal("Item Added", data.message, "success");
			$('#quantity').text(data.qty);
		})
		.fail(function() {
			swal("Item Not Available", null, "error");
		});
	})
</script>

@endsection