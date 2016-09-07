@extends('layouts.app')

@section('header')

	<link rel="stylesheet" type="text/css" href="/css/trix.css">
	<script type="text/javascript" src="/js/trix.js"></script>

@endsection

@section('content')

	<h1 class="welcome">Create a product!</h1>

	<hr/>

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	{!! Form::open(['url' => route('products.store')]) !!}
		<p>
			<label for="title">Product name:</label><br/>
			{!! Form::text('title') !!}
		</p>

		<p>
			<label for="title">Price:</label><br/>
			{!! Form::text('price') !!}
		</p>

		<p>
			<label for="title">Quantity:</label><br/>
			{!! Form::text('quantity') !!}
		</p>

		<p>
			<input id="description" type="hidden" name="description">
  			<trix-editor class="trix-content" input="description"></trix-editor>
		</p>

		{!! Form::submit('Save New Product', ['class' => 'btn btn-lg btn-primary']) !!}
	{!! Form::close() !!}


@stop