<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;

class MessageController extends Controller
{


	public function __construct() {
		$this->middleware('auth', ['except' => ['store']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return response()->json( Message::All(), 200);   //
	}

	public function mesMessages() {
		// $messages = Message::where('fk_user', Auth::id())->orderBy('created_at', 'desc')->get();
		// foreach ($messages as $message ) {
		// 	$message->read=true;
		// 	$message->save();
		// }
		// return view('inbox', ['messages' => $messages]);
		return Auth::user()->mesMessages();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$message = new Message();
		$message->content = $request->content;
		$message->email = $request->email;
		$message->fk_user = $request->fk_user;
		$message->save();
		/*return response('ok', 201);*/
		return redirect('/');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function show(Message $message)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Message $message)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Message $message)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Message  $message
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Message $message)
	{
		//
	}
}
