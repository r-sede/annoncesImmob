@extends('layouts.app')

@section('content')
<div class="container">
	@foreach ($annonces as $annonce)
	<div class="col-sm-8 col-md-6" >
		<div class="thumbnail" >
			<div class="caption">
				<h3>{{ $annonce->logement->ville }} <small>{{ $annonce->logement->code_postal }}</small></h3>
				<div style="display: flex; justify-content: space-between ">
					<div>
						<h4>{{ $annonce->logement->type_logement['name'] }}&nbsp;
							<span>{{ $annonce->logement->modalite['name'] }}</span>
							<span class="label label-default">{{ $annonce->logement->tarif }}€</span>
						</h4>
						<p></p>

					</div>
					<div style=" width:300px; height: 300px; background-position: bottom; background-image:url(storage/imageAnnonce/{{ $annonce->logement->photo }})"></div>
				</div>
				<p >{{ $annonce->logement->description }}</p>
				<!-- <p >{{ $annonce->auteur }}</p> -->
				<!-- <img class="responsive" src='storage/imageAnnonce/{{ $annonce->logement->photo }}' > -->
				<a class="btn btn-default" href="contactAuthor/{{ $annonce->fk_auteur }}">contact</a>
<!-- 				<form method="POST" action="contactAuthor/{{ $annonce->fk_auteur }}">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-default">contacter</button>
				</form> -->
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection