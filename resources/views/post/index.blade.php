@extends('layouts.app')

@section('header')

	<link rel="stylesheet" type="text/css" href="/css/trix.css">

@endsection

@section('content')

	@foreach($posts as $post)
		<a href="{{ route('posts.show', $post->id) }}"><h3>{{ $post->title }}</h3></a>

		<div class="trix-content">

			{!! trim_text($post->body, 150, true) !!} <a href="{{ route('posts.show', $post->id) }}">Read More</a>

		</div>
	@endforeach

@stop
