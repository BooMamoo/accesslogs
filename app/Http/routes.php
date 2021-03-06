<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

if(Auth::check())
{
	Route::get('form', 'FormController@index');
	Route::post('store/card', 'FormController@store_card');
	Route::post('store/log', 'FormController@store_log');
}

Route::get('list', 'ListController@index');
Route::get('listName', 'ListController@listName');
Route::get('listDay', 'ListController@listDay');
Route::get('listCheck', 'ListController@listCheck');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
