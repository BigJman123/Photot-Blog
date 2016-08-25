@extends('layouts.app')

@section('header')

	<link rel="stylesheet" type="text/css" href="/css/trix.css">
	<script type="text/javascript" src="/js/trix.js"></script>

@endsection

@section('content')

	<h1 class="welcome">Welcome, fellow Photot!</h1>

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

	{!! Form::open(['url' => route('posts.store')]) !!}
		<p>
			<label for="title">Title of Blog Post:</label><br/>
			{!! Form::text('title') !!}
		</p>

		<p>
			<input id="body" type="hidden" name="body">
  			<trix-editor class="trix-content" input="body"></trix-editor>
		</p>

		{!! Form::submit('Post') !!}
	{!! Form::close() !!}


@stop
