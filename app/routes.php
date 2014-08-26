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
	# CSRF Protection
	Route::when('*', 'csrf', ['POST', 'PUT', 'PATCH', 'DELETE']);

	Route::get('/', array('as' => 'users.login', 'uses' => 'CMS_UsersController@getLogin'));
	Route::get('/logout', array('as' => 'users.logout', 'uses' => 'CMS_UsersController@getLogout'));
	Route::post('/', array('as' => 'users.login.post', 'uses' => 'CMS_UsersController@postLogin'));
	Route::post('/profile/upload', array('as' => 'profile.changeImage.post', 'uses' => 'CMS_ProfileController@postChangeImage'));
	Route::post('/password_forgotten/', array('as' => 'users.password_forgotten.post', 'uses' => 'CMS_UsersController@postChangePassword'));

	# Standard User pages
	Route::group(array('before' => 'auth|Sentry'), function(){
		Route::resource('users', 'CMS_UsersController'); 
		Route::get('profile', 'CMS_ProfileController@showIndex');
		Route::get('page_management', 'CMS_PageManagementController@showPageManagement');
	});
	
	# Visible page for everbody
	Route::get('forgot_password', 'CMS_UsersController@password_forgotten');