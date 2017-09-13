<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
	public function auteur() {
		return $this->belongsTo('App\Logement','fk_logement','id');
	}
}
