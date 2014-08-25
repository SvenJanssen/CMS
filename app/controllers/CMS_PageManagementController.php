<?php

class CMS_PageManagementController extends \BaseController
{
	public function showPageManagement(){
		
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_pageManagement.index')->with(['user'=> $user]);
	}
}