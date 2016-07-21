@extends('layouts.app')

@section('content')

	@foreach($posts as $post)
		<a href="{{ route('posts.show', $post->id) }}"><h3>{{ $post->title }}</h3></a>

		<p>

			{{ trim_text($post->body, 300, true) }} <a href="{{ route('posts.show', $post->id) }}">Read More</a>

		</p>
	@endforeach

@stop
