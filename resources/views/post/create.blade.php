@extends('layouts.app')

@section('content')

	<h1 class="welcome">Welcome, fellow Photot!</h1>

	<hr/>

	{!! Form::open(['url' => route('posts.store')]) !!}
		<p>
			<label for="title">Title of Blog Post:</label><br/>
			{!! Form::text('title') !!}
		</p>

		<p>
			<label for="title">Type here:</label><br/>
			{!! Form::textarea('body') !!}
		</p>

		{!! Form::submit('Post') !!}
	{!! Form::close() !!}

@stop
