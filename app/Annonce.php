<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
	public function logement() {
		return $this->belongsTo('App\Logement','fk_logement');

	}

	public function auteur() {
		return $this->belongsTo('App\User', 'fk_auteur');
	}
}
