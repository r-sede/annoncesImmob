<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		   
			$this->middleware('auth', ['except' => ['index','show']]);
	}



	public function index()
	{
		return response()->json( Annonce::All(), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$type_parking = DB::table('type_parking')->get();
		$type_logement = DB::table('type_logement')->get();
		$modalite_acces = DB::table('modalite_acces')->get();

		return view('createAnnonceForm', [
			'types_parking' => $type_parking,
			'types_logement' => $type_logement,
			'modalites_acces' => $modalite_acces,
		]); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		//validate
		$idLogement = DB::table('logements')->insertGetId([
			'n_rue' => $request->n_rue,
			'rue' => $request->rue,
			'code_postal' => $request->code_postal,
			'ville' => $request->ville,
			'superficie' => $request->superficie,
			'fk_type_logements' =>$request->type_logement,
			'meuble' => $request->meuble === 'on',
			'tarif' => $request->tarif,
			'fk_modalite' => $request->modalite_acces,
			'etage' => $request->etage,
			'fk_type_parking' => $request->type_parking === 'non' ? null : $request->type_parking,
			'n_chambre' => $request->n_chambre,
			'description' => $request->description,
			'photo' => $request->photo,
			'classe_energie' => $request->classe_energie,
			'classe_gesc' => $request->classe_gesc,
		]);
		//handle file
		$annonce = new Annonce();
		$annonce->fk_auteur = Auth::id();
		$annonce->fk_logement = $idLogement;
		$annonce->save();
		return redirect('/');




	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Annonce  $annonce
	 * @return \Illuminate\Http\Response
	 */
	public function show(Annonce $annonce)
	{
		return response($annonce, 200);
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Annonce  $annonce
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Annonce $annonce)
	{
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Annonce  $annonce
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Annonce $annonce)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Annonce  $annonce
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Annonce $annonce)
	{
		//
	}
}
