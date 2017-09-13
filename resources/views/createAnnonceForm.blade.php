@extends('layouts.app')

@section('createAnnonceForm')
	<form method="POST" action="{{ route('laroutepourcreer') }}" enctype="multipart/form-data">
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
	    <label for="superficie">superficie</label>
	    <input required name="superficie" type="text" class="form-control" id="superficie" placeholder="30">
	  </div>

	  <div class="checkbox">
	    <label>
	      <input type="checkbox" name="meuble" id="meuble"> Meuble
	    </label>
	  </div>
	{{ csrf_field() }}
	  <div class="form-group">
	    <label for="etage">etage</label>
	    <input name="etage" type="text" class="form-control" id="etage" placeholder="">
	  </div>

	  <div class="form-group">
	    <label for="n_chambre">n_chambre</label>
	    <input required name="n_chambre" type="text" class="form-control" id="n_chambre" placeholder="">
	  </div>

	  <div class="form-group">
	    <label for="description">description</label>
	    <textarea required class="form-control" id="description" name="description" rows="3"></textarea>
	  </div>

	  <div class="form-group">
	    <label for="photo">photo</label>
	    <input required type="file" id="photo">
	    <p class="help-block">Example block-level help text here.</p>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>

	

	</form>
@endsection