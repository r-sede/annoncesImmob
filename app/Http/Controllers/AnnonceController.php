<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Image;


class AnnonceController extends Controller
{

	public function __construct() {
		   
			$this->middleware('auth', ['except' => ['index','show']]);
	}





	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index()
	{
		
	
		$res = Annonce::orderBy('created_at', 'desc')->get();
		/*return response()->json( Annonce::All(), 200);*/
		return view('index', [ 'annonces' => $res ]);
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

		if($request->hasFile('photo')){
			$tof= $request->file('photo');
    		$filename = time() . '.' . $tof->getClientOriginalExtension();
    		Image::make($tof)->resize(200, 200)->save( public_path('/storage/imageAnnonce/' . $filename ) );			
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
				'photo' => $filename,
				'classe_energie' => $request->classe_energie,
				'classe_gesc' => $request->classe_gesc,
			]);
			//handle file
			$annonce = new Annonce();
			$annonce->fk_auteur = Auth::id();
			$annonce->fk_logement = $idLogement;

			$nn = time() + 8 * 24 * 3600;
	        $today = new \DateTime();
	        $today->setTimestamp($nn);
	        $annonce->expire_at = $today->format('Y-m-d H:i:s');
			$annonce->save();
		}
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
		/*return response($annonce, 200);*/
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
		if($annonce->auteur['id'] != Auth::id()) {
			return redirect('/');
		}
		/*$annonce->logement;*/

		$type_parking = DB::table('type_parking')->get();
		$type_logement = DB::table('type_logement')->get();
		$modalite_acces = DB::table('modalite_acces')->get();

		return view('editAnnonce', [
			'annonce' => $annonce,
			'types_parking' => $type_parking,
			'types_logement' => $type_logement,
			'modalites_acces' => $modalite_acces,
		]);
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
		return 'coucou';
		
/*		$annonce->logement->n_rue = $request->n_rue;
		$annonce->logement->rue = $request->rue;
		$annonce->logement->code_postal = $request->code_postal;
		$annonce->logement->ville = $request->ville;
		$annonce->logement->superficie = $request->superficie;
		$annonce->logement->fk_type_logements = $request->fk_type_logements;
		$annonce->logement->meuble = $request->meuble;
		$annonce->logement->fk_modalite = $request->fk_modalite;
		$annonce->logement->etage = $request->etage;
		$annonce->logement->fk_type_parking = $request->fk_type_parking;
		$annonce->logement->n_chambre = $request->n_chambre;
		$annonce->logement->description = $request->description;

		$annonce->logement->classe_energie = $request->classe_energie;
		$annonce->logement->classe_gesc = $request->classe_gesc;
		$annonce->logement->save();*/

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Annonce  $annonce
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Annonce $annonce)
	{

	}


	public function mesAnnonces() {
		return Auth::user()->mesAnnonces();
	}
}
