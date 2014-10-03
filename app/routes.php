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
	
	# Get routes
	Route::get('/', array('as' => 'users.login', 'uses' => 'CMS_UsersController@getLogin'));
	Route::get('/logout', array('as' => 'users.logout', 'uses' => 'CMS_UsersController@getLogout'));

	
	# Post routes
	Route::post('/', array('as' => 'users.login.post', 'uses' => 'CMS_UsersController@postLogin'));
	Route::post('/password_forgotten/', array('as' => 'users.password_forgotten.post', 'uses' => 'CMS_UsersController@postChangePassword'));
	Route::post('/db_select', array('as' => 'select.db.post', 'uses' => 'BaseController@postConnectDB'));
	Route::post('/email/send', array('as' => 'sendEmail.post', 'uses' => 'EmailController@postSend'));
	Route::post('/resetpassword', array('as' => 'users.reset_password.post', 'uses' => 'CMS_UsersController@postResetPassword'));
	Route::post('/profile/upload', array('as' => 'profile.changeImage.post', 'uses' => 'CMS_ProfileController@postChangeImage'));

	# Post routes page management
	Route::group(array('before' => 'database|Sentry'), function(){
		Route::post('/addRoute', array('as' => 'addRoute.post', 'uses' => 'CMS_PagesController@postAddRoute'));
		Route::post('/editRoute', array('as' => 'editRoute.post', 'uses' => 'CMS_PagesController@postEditRoute'));
		Route::post('/deleteRoute', array('as' => 'deleteRoute.post', 'uses' => 'CMS_PagesController@postDeleteRoute'));
	});

	# Standard User pages
	Route::group(array('before' => 'database|Sentry'), function(){
		Route::resource('profile', 'CMS_ProfileController');
		Route::resource('pages', 'CMS_PagesController');
		Route::resource('users', 'CMS_UsersController'); 
		Route::get('website/{database}', array('as' => 'website.select', 'uses' => 'BaseController@selectDB'));
	});

	# Multi database connections
	/*Route::group(array('before' => 'database'), function(){
		//Route::get('/country', array('as' => 'country.index', 'uses' => 'CountryController@index'));
		//Route::get('country/create', array('as' => 'country.insert', 'uses' => 'CountryController@insert'));
		Route::get('website/{database}', array('as' => 'website.select', 'uses' => 'BaseController@selectDB'));
	});*/
	
	# Admin pages
	
	# Visible pages for everbody
	Route::get('forgot_password', 'CMS_UsersController@password_forgotten');
	Route::get('/resetpassword', array('as' => 'users.errorResetCode', 'uses' => 'CMS_UsersController@errorResetCode'));