<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
	public $timestamps = false;

	public function type_logement() {
		return $this->belongsTo('App\Type_logement','fk_type_logements');

	}	

	public function modalite() {
		return $this->belongsTo('App\Modalite_acces','fk_modalite');

	}

	public function type_parking() {
		return $this->belongsTo('App\Type_parking','fk_type_parking');

	}

}
