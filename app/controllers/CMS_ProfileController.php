<?php

class CMS_ProfileController extends \BaseController
{
	public function showIndex(){
		
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_profile.index')->with(['user'=> $user]);
	}
	
	public function postChangeImage(){
		return View::make('CMS_profile.upload_file');
	}
}