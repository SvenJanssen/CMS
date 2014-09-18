<?php

class CountryController extends BaseController{
	public function index(){
		$country = Country::where('iso', '=', 'nl')->first();
		echo $country->translate('en')->name; // Niederlande
	}
	
	public function insert(){
		// $country = Country::where('iso', '=', 'nl')->first();
		// dd($country);
		
		// echo $country->translate('en')->name; // Greece

		// $country->translate('en')->name = 'ietsrandoms';
		
		// $country->save();
		
		// echo $country->translate('en')->name; // Greece
	}
}