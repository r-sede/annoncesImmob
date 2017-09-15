@extends('layouts.app')

@section('content')

<div class="container">
	<form method="PUT" action="{{ route('annonces.update', $annonce) }}" enctype="multipart/form-data">
		
		<div class="row">
			<div class="col-xs-3">
		
				<label>Adresse: </label>
				<div class="form-group">
					<label for="n_rue">n° rue</label>
					<input required name="n_rue" type="text" class="form-control" id="n_rue" placeholder="n° rue" 
						value="{{ $annonce->logement->n_rue }}"
					>
				</div>
				<div class="form-group">
					<label for="rue">rue</label>
					<input required name="rue" type="text" class="form-control" id="rue" placeholder="rue des gambas"
						value="{{ $annonce->logement->rue }}"
					>
				</div>
				<div class="form-group">
					<label for="code_postal">code_postal</label>
					<input required name="code_postal" type="text" class="form-control" id="code_postal" placeholder="32000"
						value="{{ $annonce->logement->code_postal }}"
					>
				</div>
				<div class="form-group">
					<label for="ville">ville</label>
					<input required name="ville" type="text" class="form-control" id="ville" placeholder="Auch"
						value="{{ $annonce->logement->ville }}"
					>
				</div>
			</div>
			<div class="col-xs-3">
				<label>detail du logement</label>

				<div class="form-group">
					<label for="etage">etage</label>
					<input name="etage" type="text" class="form-control" id="etage" placeholder=""
						value="{{ $annonce->logement->etage }}"
					>
				</div>

				<div class="form-group">
					<label for="tarif">tarif €</label>
					<input required name="tarif" type="text" class="form-control" id="tarif" placeholder="300"
						value="{{ $annonce->logement->tarif }}"
					>
				</div>

				<div class="form-group">
					<label for="superficie">superficie m²</label>
					<input required name="superficie" type="text" class="form-control" id="superficie" placeholder="30"
						value="{{ $annonce->logement->superficie }}"
					>
				</div>

				<div class="form-group">
					<label for="n_chambre">nombres de chambre</label>
					<input required name="n_chambre" type="text" class="form-control" id="n_chambre" placeholder=""
						value="{{ $annonce->logement->n_chambre }}"
					>
				</div>





			</div>
			<div class="col-xs-3">
				<label>detail du logement 2</label>
				<div class="checkbox">
					<label>
						@if ($annonce->logement->meuble)
							<input type="checkbox" name="meuble" id="meuble" checked > Meublé
						@else
							<input type="checkbox" name="meuble" id="meuble"> Meublé
						@endif
					</label>
				</div>

				<div class="form-group">
					<label for="modalite_acces">modalite_acces</label>
					<select required name="modalite_acces" id="modalite_acces">
						@foreach ($modalites_acces as $modalite_acces)
							@if ($modalite_acces->id === $annonce->logement->modalite['id'] )
								<option value="{{ $modalite_acces->id }}" selected>{{ $modalite_acces->name }}</option>
							@else
								<option value="{{ $modalite_acces->id }}" >{{ $modalite_acces->name }}</option>
							@endif

						@endforeach
					</select>
					<!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>

				<div class="form-group">
					<label for="type_logement">type_logement</label>
					<select required name="type_logement" id="type_logement">
						@foreach ($types_logement as $type_logement)
							@if ($type_logement->id === $annonce->logement->type_logement['id'])
								<option selected value="{{$type_logement->id}}" >{{ $type_logement->name }}</option>
							@else
								<option value="{{$type_logement->id}}">{{ $type_logement->name }}</option>
							@endif						
						@endforeach
					</select>
					<!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>

				<div class="form-group">
					<label for="type_parking">type_parking</label>
					<select name="type_parking" id="type_parking">
						<option>non</option>
						@foreach ($types_parking as $type_parking)
							@if ($type_parking->id === $annonce->logement->type_parking['id'])
								<option selected value="{{$type_parking->id}}">{{ $type_parking->name }}</option>
							@else
								<option value="{{$type_parking->id}}">{{ $type_parking->name }}</option>
							@endif
						@endforeach
					</select>
					<!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>
					


				<div class="form-group">
					<label for="classe_energie">classe_energie</label>
					<select required name="classe_energie" id="classe_energie">

						<option class="doublon" value="{{ $annonce->logement->classe_energie }}">{{ $annonce->logement->classe_energie }}</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
						<option value="F">F</option>
						<option value="G">G</option>
					</select>
					<!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>



				<div class="form-group">
					<label for="classe_gesc">classe_gesc</label>
					<select required name="classe_gesc" id="classe_gesc">
						<option value="{{ $annonce->logement->classe_gesc }}">{{ $annonce->logement->classe_gesc }}</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
						<option value="F">F</option>
						<option value="G">G</option>
					</select>
					<!-- <p class="help-block">Example block-level help text here.</p> -->
				</div>

				<div class="form-group">
					<label for="photo">photo</label>
					<input required type="file" name="photo" id="photo">
					<p class="help-block">Example block-level help text here.</p>
				</div>
				 {{ csrf_field() }}
			</div>
		</div><!-- row -->

		<div class="form-group">
			<label for="description">description</label>
			<textarea required class="form-control" id="description" name="description" rows="3">
				{{ $annonce->logement->description }}
			</textarea>
		</div>
		<button type="submit" class="btn btn-default">Enregistrer</button>




	</form>
</div>
@endsection
