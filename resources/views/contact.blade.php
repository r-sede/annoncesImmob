@extends('layouts.app')

@section('content')
<div class="container">

	<form method="POST" action="{{ route('messages.store') }}" >
		<label>Email de contact </label>
		<div class="form-group">
			<label for="email">email</label>
			<input required name="email" type="text" class="form-control" id="email" placeholder="exemple@lol.com">
		</div>
		<div class="form-group">
			<label for="content">votre message:</label>
			<textarea required class="form-control" id="content" name="content" rows="3"></textarea>
		</div>		
		<input type="hidden" name="fk_user" id="fk_user" value="{{ $idAuthor }}">
		 {{ csrf_field() }}
		<button type="submit" class="btn btn-default">Submit</button>



	</form>
@endsection