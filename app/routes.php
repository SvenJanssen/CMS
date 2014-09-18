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
	Route::post('/profile/upload', array('as' => 'profile.changeImage.post', 'uses' => 'CMS_ProfileController@postChangeImage'));
	Route::post('/password_forgotten/', array('as' => 'users.password_forgotten.post', 'uses' => 'CMS_UsersController@postChangePassword'));
	Route::post('/db_select', array('as' => 'select.db.post', 'uses' => 'BaseController@postConnectDB'));
	Route::post('/email/send', array('as' => 'sendEmail.post', 'uses' => 'EmailController@postSend'));
	Route::post('/resetpassword', array('as' => 'users.reset_password.post', 'uses' => 'CMS_UsersController@postResetPassword'));

	# Post routes page management
	Route::post('/addRoute/', array('as' => 'addRoute.post', 'uses' => 'CMS_PageManagementController@addRoute'));

	# Standard User pages
	Route::group(array('before' => 'auth|Sentry'), function(){
		Route::resource('users', 'CMS_UsersController'); 
		Route::get('profile', 'CMS_ProfileController@showIndex');
		Route::get('page_management', array('as' => 'pageManagement.select', 'uses' => 'CMS_PageManagementController@showPageManagement'));
		Route::get('page_management/add_page/', array('as' => 'add_page', 'uses' => 'CMS_PageManagementController@showTest'));
	});
	
	# Multi database connections
	Route::group(array('before' => 'database'), function(){
		//Route::get('/country', array('as' => 'country.index', 'uses' => 'CountryController@index'));
		//Route::get('country/create', array('as' => 'country.insert', 'uses' => 'CountryController@insert'));
		Route::get('website/{database}', array('as' => 'website.select', 'uses' => 'BaseController@selectDB'));
	});
	
	# Admin pages
	
	# Visible pages for everbody
	Route::get('forgot_password', 'CMS_UsersController@password_forgotten');
	Route::get('/resetpassword', array('as' => 'users.errorResetCode', 'uses' => 'CMS_UsersController@errorResetCode'));