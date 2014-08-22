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

Route::get('/', array('as' => 'users.login', 'uses' => 'CMS_UsersController@getLogin'));
Route::get('/logout', array('as' => 'users.logout', 'uses' => 'CMS_UsersController@getLogout'));
Route::post('/', array('as' => 'users.login.post', 'uses' => 'CMS_UsersController@postLogin'));

/*Route::group(array('before' => 'auth|inGroup:admin'), function()
{*/
	
	Route::resource('users', 'CMS_UsersController'); 
	
	Route::get('profile', 'CMS_ProfileController@showIndex'); 
	
	
//});



