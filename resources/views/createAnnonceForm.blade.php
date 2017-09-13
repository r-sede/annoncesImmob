@extends('layouts.app')

@section('content')
<div class="container">

	<form method="POST" action="/annonces" enctype="multipart/form-data">
		<label>Adresse: </label>
		<div class="form-group">
			<label for="n_rue">n° rue</label>
			<input required name="n_rue" type="text" class="form-control" id="n_rue" placeholder="n° rue">
		</div>
		<div class="form-group">
			<label for="rue">rue</label>
			<input required name="rue" type="text" class="form-control" id="rue" placeholder="rue des gambas">
		</div>
		<div class="form-group">
			<label for="code_postal">code_postal</label>
			<input required name="code_postal" type="text" class="form-control" id="code_postal" placeholder="32000">
		</div>
		<div class="form-group">
			<label for="ville">ville</label>
			<input required name="ville" type="text" class="form-control" id="ville" placeholder="Auch">
		</div>

		<label>detail du logement</label>

		<div class="form-group">
			<label for="modalite_acces">modalite_acces</label>
			<select required name="modalite_acces" id="modalite_acces">
				@foreach ($modalites_acces as $modalite_acces)
				<option value="{{$modalite_acces->id}}">{{ $modalite_acces->name }}</option>
				@endforeach
			</select>
			<!-- <p class="help-block">Example block-level help text here.</p> -->
		</div>

		<div class="form-group">
			<label for="tarif">tarif</label>
			<input required name="tarif" type="text" class="form-control" id="tarif" placeholder="300">
		</div>

		<div class="form-group">
			<label for="superficie">superficie</label>
			<input required name="superficie" type="text" class="form-control" id="superficie" placeholder="30">
		</div>

		<div class="checkbox">
			<label>
				<input type="checkbox" name="meuble" id="meuble"> Meuble
			</label>
		</div>



		<div class="form-group">
			<label for="etage">etage</label>
			<input name="etage" type="text" class="form-control" id="etage" placeholder="">
		</div>

		<div class="form-group">
			<label for="type_logement">type_logement</label>
			<select required name="type_logement" id="type_logement">
				@foreach ($types_logement as $type_logement)
				<option value="{{$type_logement->id}}">{{ $type_logement->name }}</option>
				@endforeach
			</select>
			<!-- <p class="help-block">Example block-level help text here.</p> -->
		</div>

		<div class="form-group">
			<label for="type_parking">type_parking</label>
			<select name="type_parking" id="type_parking">
				<option>non</option>
				@foreach ($types_parking as $type_parking)
				<option value="{{$type_parking->id}}">{{ $type_parking->name }}</option>
				@endforeach
			</select>
			<!-- <p class="help-block">Example block-level help text here.</p> -->
		</div>

		<div class="form-group">
			<label for="n_chambre">n_chambre</label>
			<input required name="n_chambre" type="text" class="form-control" id="n_chambre" placeholder="">
		</div>


		<div class="form-group">
			<label for="classe_energie">classe_energie</label>
			<select required name="classe_energie" id="classe_energie">
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
			<label for="description">description</label>
			<textarea required class="form-control" id="description" name="description" rows="3"></textarea>
		</div>

		<div class="form-group">
			<label for="photo">photo</label>
			<input required type="file" name="photo" id="photo">
			<p class="help-block">Example block-level help text here.</p>
		</div>
		 {{ csrf_field() }}
		<button type="submit" class="btn btn-default">Submit</button>



	</form>
</div>
@endsection
