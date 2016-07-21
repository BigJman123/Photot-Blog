@extends('layouts.app')

@section('content')
	<h1>Edit the Post</h1>

	{!! Form::model($post, ['url' => route('posts.update', $post->id), 'method' => 'PATCH']) !!}
		<p>
			<label for="title">Title of Blog Post:</label><br/>
			{!! Form::text('title') !!}
		</p>

		<p>
			<label for="title">Type here:</label><br/>
			{!! Form::textarea('body') !!}
		</p>

		{!! Form::submit('Update Post') !!}
	{!! Form::close() !!}
@stop