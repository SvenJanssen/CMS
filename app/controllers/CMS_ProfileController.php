<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManager;

class CMS_ProfileController extends \BaseController
{
	public function index(){
        return View::make('CMS_profile.index')->with(['user'=> $this->user]);
	}
	
	public function postChangeImage(){
		
		$file = Input::file('file');
		
		if($file == null || $file == ""){
			Notification::error('U heeft geen afbeelding geselecteerd!');
			return Redirect::back();
		}else{
			$filename = $file->getClientOriginalName();
			if(Image::make($file->getRealPath())->resize('150', '200')->save('app/assets/images/'. $filename)){
			
				DB::table('users')->where('id', $this->user->id)->update(array('profile_image' => $filename));
				
				Notification::success('Uw profielafbeeling is succesvol gewijzigd');
				return Redirect::to('profile');
			}else{
				return Redirect::back();
			}
		}
	}
}