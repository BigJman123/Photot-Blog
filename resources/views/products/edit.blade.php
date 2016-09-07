@extends('layouts.app')

@section('header')

	<link rel="stylesheet" type="text/css" href="/css/trix.css">
	<script type="text/javascript" src="/js/trix.js"></script>

@endsection

@section('content')
	
	<h1>Edit this product</h1>

	{!! Form::model($product, ['url' => route('products.update', $product->id), 'method' => 'PATCH']) !!}
		<p>
			<label for="title">Product name:</label><br/>
			{!! Form::text('title') !!}
		</p>

		<p>
			<label for="price">Price:</label><br/>
			{!! Form::text('price') !!}
		</p>

		<p>
			<label for="quantity">Quantity:</label><br/>
			{!! Form::text('quantity') !!}
		</p>

		<p>
			{!! Form::hidden('description', null, ['id' => 'description']) !!}
  			<trix-editor class="trix-content" input="description"></trix-editor>
		</p>

		{!! Form::submit('Update Product') !!}
	{!! Form::close() !!}
@stop