@extends('layouts.app')

@section('content')
<div class="container">
	@foreach ($messages as $message)
	<div class="row">

		<blockquote>
			<p>{{ $message->content }}</p>
			<p><a class="btn btn-info" href="mailto:{{ $message->email }}">repondre</a></p>
		</blockquote>

	</div>
@endforeach
</div>
@endsection
