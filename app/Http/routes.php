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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/user', function()
{
  $user = new \App\User;
  $user->username = 'philipbrown';
  $user->email = 'name@domain.com';
  $user->password = 'deadgiveaway';
  $user->password_confirmation = 'deadgiveaway';
  var_dump($user->save());
});