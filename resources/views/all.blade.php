@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		@foreach ($annonces as $annonce)
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <div class="caption">
		        <h3>{{ $annonce->logement->ville }}</h3>
		      	<img src='{{ $annonce->logement->photo }}' >
		        <p>{{ $annonce->logement->tarif }}</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		@endforeach
	</div>
@endsection