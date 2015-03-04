<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('','BaseController@setupLayout');

/*Route::get('/', function()
	{
		return View::make('layouts.default');
	});*/

Route::resource('/', 'HomeController');

Route::controller('users', 'UsersController');
Route::resource('categories','CategoryController');
Route::resource('gyms','GymController');
Route::resource('prices','PriceController');
Route::resource('openinghours','OpeningHourController');
Route::resource('reviews','ReviewController');

Route::get('prices/create/{id}', 'PriceController@create');
Route::get('openinghours/create/{id}', 'OpeningHourController@create');
Route::get('reviews/create/{id}', 'ReviewController@create');

Route::get('gyms/place/{place}',  array('as' => 'place' , 'uses' => 'GymController@place'));
Route::get('gyms/search/{query}',  array('as' => 'search' , 'uses' => 'GymController@search'));
Route::get('gyms/view/{id}', array('as' =>  'view', 'uses' => 'GymController@view'));

//Route::get('gyms/place/{place}', 'GymController@place');

/*Route::get('gyms', function(){
	return View::make('gyms/index')->with('gyms', Gym::all()->with('users'));
});*/