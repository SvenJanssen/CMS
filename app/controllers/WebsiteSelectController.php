<?php

Class WebsiteSelectController extends BaseController{
	
	public function selectWebsite($database){

		//Event::fire('triggerDB', [$database]);

		Session::set('database', $database);

		//$user = DB::table('person')->get();

		//return View::make('website/'. $database . '.index')->with('user', $user);
	}
}