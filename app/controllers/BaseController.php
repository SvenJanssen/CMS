<?php

class BaseController extends Controller {

	protected $user;
	
	public function __construct(){
		if(Sentry::check())
			$this->user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if (!is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	// 
	public function selectDB($database){
		// Pure for js
		setcookie('database', $database, 0, '/');

		Session::set('database', $database);
		Session::set('temp_login', Sentry::getUser());

		Notification::success('U heeft succesvol de website <b>' . $database . '</b> geselecteerd.');
		return Redirect::back();
	}
}