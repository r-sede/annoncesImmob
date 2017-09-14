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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/','AnnonceController@index');

Route::get('/mesMessages','MessageController@mesMessages')->name('mesMessages');
Route::get('/mesAnnonces','AnnonceController@mesAnnonces')->name('mesAnnonces');

Route::get('/contactAuthor/{id}', function($id) {
	return view('contact', ['idAuthor' => $id]);
});



Route::resource('annonces', 'AnnonceController');
Route::resource('messages', 'MessageController');