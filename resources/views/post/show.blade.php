@extends('layouts.app')

@section('content')

	<h1>{{ $post->title }}</h1>

	<hr/>

	<div>

		{{ $post->body }}

	</div>


@stop
