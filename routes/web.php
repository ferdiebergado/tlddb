<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('welcome');
})->name('home');

Route::post('/signin', [
	'uses' 	=> 'UserController@postLogin',
	'as'	=> 'signin'
	]);

Route::get('/paxform/pagemode/{pagemode}/pid/{pid}', [
	'uses' 	=> 'ParticipantController@getPaxForm',
	'as'	=> 'paxform'
	]);

Route::get('/updatedivisions', [
	'uses' 	=> 'ParticipantController@getUpdatedivisions',
	'as'	=> 'updatedivisions'
	]);

Route::post('/savedata', [
	'uses' 	=> 'ParticipantController@postSaveData',
	'as'	=> 'savedata'	
	// 'middleware' => 'auth'
	]);

Route::get('/dashboard', [
	'uses' 	=> 'ParticipantController@getDashboard',
	'as'	=> 'dashboard',
	'middleware' => 'auth'
	]);

Route::get('/events', [
	'uses' 	=> 'ParticipantController@getEvent', 
	'as'	=> 'events', 
	'middleware' => 'auth'
	]);

Route::get('/search', [
	'uses' 	=> 'ParticipantController@getSearch', 
	'as'	=> 'search', 
	'middleware' => 'auth'
	]);

Route::get('/addtoevent', [
	'uses' 	=> 'ParticipantController@getAddToEvent', 
	'as'	=> 'addtoevent', 
	'middleware' => 'auth'
	]);

Route::get('/download/event/{eventid}', [
	'uses' 	=> 'ParticipantController@startDownload',
	'as'	=> 'download',
	'middleware' => 'auth'
	]);

Route::get('/logout', [
	'uses'	=> 'UserController@getLogout', 
	'as' 	=> 'logout'
	]);

Route::get('/divisions', [
	'uses'	=>	'ParticipantController@getUpdatedDivisions', 
	'as'	=>	'getdivisions'	
	]
);