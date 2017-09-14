<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','AnnonceController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contactAuthor/{id}', function($id) {
	return view('contact', ['idAuthor' => $id]);
});
Route::get('/mesMessages','MessageController@mesMessages')->name('mesMessages');
Route::resource('annonces', 'AnnonceController');


Route::resource('messages', 'MessageController');