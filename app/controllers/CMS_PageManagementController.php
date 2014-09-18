<?php

class CMS_PageManagementController extends \BaseController
{
	public function showPageManagement(){
		
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_pageManagement.index')->with(['user'=> $user]);
	}

	public function showTest(){
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

		return View::make('CMS_pageManagement.add_page')->with(['user'=> $user]);
	}

	public function addRoute(){

		
		
		return 'route added';
	}
}


//$slug = Str::slug($pageTitle);