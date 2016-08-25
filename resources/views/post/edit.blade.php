@extends('layouts.app')

@section('header')

	<link rel="stylesheet" type="text/css" href="/css/trix.css">
	<script type="text/javascript" src="/js/trix.js"></script>

@endsection

@section('content')
	
	<h1>Edit the Post</h1>

	{!! Form::model($post, ['url' => route('posts.update', $post->id), 'method' => 'PATCH']) !!}
		<p>
			<label for="title">Title of Blog Post:</label><br/>
			{!! Form::text('title') !!}
		</p>

		<p>
			{!! Form::hidden('body', null, ['id' => 'body']) !!}
  			<trix-editor class="trix-content" input="body"></trix-editor>
		</p>

		{!! Form::submit('Update Post') !!}
	{!! Form::close() !!}
@stop