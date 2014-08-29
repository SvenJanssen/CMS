<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManager;

class CMS_ProfileController extends \BaseController
{

	public function __contruct(){
		parent::__contruct();
		Breadcrumbs::addCrumb('Profiel', 'profile');
	}
	
	public function showIndex(){
		
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_profile.index')->with(['user'=> $user]);
	}
	
	public function postChangeImage(){
		
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();
		
		$file = Input::file('file');
		$filename = $file->getClientOriginalName();
		
		if(Image::make($file->getRealPath())->resize('300', '200')->save('public/uploads/'. $filename)){
			
			DB::table('users')->where('id', $user->id)->update(array('profile_image' => $filename));
			
			return Redirect::to('profile');
		}else{
			return Redirect::back();
		}
	}
}