<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	
	// 
	public function selectDB($database){;
		
		Session::set('database', $database);

		$persons = DB::table('person')->get();

		return Redirect::back()->with(['persons' => $persons]);
	}
}