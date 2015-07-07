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

Route::get(
	'/', 
	array('uses' => 'HomeController@recepies')
);

Route::get(
	'/details/{id}', 
	array('uses' => 'HomeController@details')
);

Route::get(
	'/addTwist', 
	array('uses' => 'HomeController@userSub')
);

Route::get(
	'/admin', 
	array('uses' => 'HomeController@admin')
);

Route::get(
	'/validate/{id}', 
	array('uses' => 'HomeController@updateTwist')
);
