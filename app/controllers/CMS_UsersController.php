<?php

class CMS_UsersController extends \BaseController
{
	public function login($user)
	{
	 	Sentry::login($user, false);

	   	Event::fire('user.login', array('userId' => $user->id));
	}

	public function getLogin()
	{
		return View::make('CMS_users.login');
	}

	public function postLogin() 
	{
		$user = new User;

		$v = Validator::make(Input::all(), $user->rules('login'));

 		if ($v->fails()) 
	   		return Redirect::route('users.login')->withInput()->withErrors($v->messages());

	   	$user = Sentry::findUserByCredentials(array(
	        'email'      => Input::get('email'),
	        'password'   => Input::get('password'),
	    ));

	    $adminGroup = Sentry::findGroupByName('admin');

	   	$this->login($user);

	    if($user->inGroup($adminGroup))
	   		return Redirect::route('users.index');

   		return Redirect::route('users.login');
	}

	public function getLogout()
	{
		Sentry::logout();

		Event::fire('user.logout');

		return Redirect::route('users.login');
	}

	public function index()
	{
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_users.index')->with(['user'=> $user]);
	}
	
	public function profile()
	{
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_users.index')->with(['user'=> $user]);
	}

	public function create()
	{
            return View::make('users.create');
	}

	public function store()
	{
            $user = new User;

            $v = Validator::make(Input::all(), $user->rules('insert'));

            if($v->fails())
            {
                Notification::error('Niet alle verplichte velden zijn ingevuld');
                return Redirect::route('users.create')->withInput()->withErrors($v->messages());            
            }
            else
            {
                // Create the user
                $user = Sentry::createUser(Input::all()+array('password' => 'test'));

                // Find the group using the group id
                $adminGroup = Sentry::findGroupByName('customer');

                // Assign the group to the user
                $user->addGroup($adminGroup);
                Notification::success('Dienst succesvol opgeslagen');
                return Redirect::route('users.index');
            }              
	}

	public function show($id)
	{
        return Response::json(User::find($id)->toArray());
	}

	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            $user = new User;

            $v = Validator::make(Input::all(), $user->rules('update'));

            if($v->fails())
            {
                Notification::error('Niet alle verplichte velden zijn ingevuld');
                return Redirect::route('users.index', array('id' => $id))->with('user', User::find($id))->withInput()->withErrors($v->messages());            
            }
            else
            {
                User::find($id)->update(Input::all());
                Notification::success('Dienst succesvol opgeslagen');
                return Redirect::route('users.index');
            }            
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	public function password_forgotten(){
		return View::make('CMS_users.password_forgotten');
	}
	
	public function postChangePassword(){
		//
	}
}