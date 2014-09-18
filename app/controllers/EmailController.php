<?php

class EmailController extends BaseController{
		public function postSend(){
	
		$data = Input::all();
		
		Mail::send('CMS_users.message', $data, function($message) use ($data)
		{
			$message->to('svenjanssen84@live.nl', 'Sven')
					->subject('Iemand heeft ons nodig!');
			$message->email = $data['email'];
		});
		
		return  Redirect::back();
	}
}