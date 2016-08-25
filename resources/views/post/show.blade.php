@extends('layouts.app')

@section('header')

	<link rel="stylesheet" type="text/css" href="/css/trix.css">

@endsection

@section('content')

	@if($post->user_id == Auth::id())
		<div class="button-container pull-right">
			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>

			{{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) }}
			<button type="submit" class="btn btn-primary">Delete</button>
			{{ Form::close() }}
		</div>
	@endif

	<h1>{{ $post->title }}</h1>

	<hr/>

	<div class="trix-content">

		{!! $post->body !!}

	</div>


@stop

@section('footer')
	<script>
		$('form').on('submit', function(e) {
			e.preventDefault();
			swal({   
					title: "Are you sure?",   
					text: "You will not be able to recover this imaginary file!",   
					type: "warning",   
					showCancelButton: true,   
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "Yes, delete it!",   
					closeOnConfirm: false
				}, function(){
					$('form')[0].submit();
				});
		});
	</script>
@endsection
