@extends('layouts.app')

@section('content')

	@foreach($products as $product)
		<a href="{{ route('products.show', $product->id) }}"><h3>{{ $product->title }}</h3></a>
	@endforeach

@stop