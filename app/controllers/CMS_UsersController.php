<?php

class CMS_UsersController extends \BaseController
{
	public function login($user){
		//return $user;
		
	 	Sentry::login($user, false);

	   	Event::fire('user.login', array('userId' => $user->id));
	}

	public function getLogin(){
		if(Sentry::check()) return Redirect::route('users.index');
		
		return View::make('CMS_users.login');
	}

	public function postLogin(){
		$user = new User;

		$v = Validator::make(Input::all(), $user->rules('login'));
		
		
		
		if($v->fails()) {
			return Redirect::route('users.login')
					->withErrors($v->messages())
					->withInput();
		} else {
			try{
				$user = Sentry::findUserByCredentials(array(
					'email'      => Input::get('email'),
					'password'   => Input::get('password'),
				));
				
				if($rememberMe = (Input::get('remember') == 'checked' ? true : false) == true){
					Sentry::login($user, false);
					
					return Redirect::route('users.login');
				}else{
					Sentry::login($user, false);

					return Redirect::route('users.login');
				}
			}catch(Cartalyst\Sentry\Users\WrongPasswordException $e){
				
				//return Redirect::back()->withInput()->with('message', 'Your email or password are incorrect.');
				
				return Redirect::back()
						->with('incorrectPassword', true)
						->withInput();
				
			}
		}

 		// if ($v->fails()){
	   		// return Redirect::route('users.login')
				// ->withInput()
				// ->withErrors($v->messages());
		// }else{
			// try{
				// $user = Sentry::findUserByCredentials(array(
					// 'email'      => Input::get('email'),
					// 'password'   => Input::get('password'),
				// ));

				// $this->login($user);

				// return Redirect::route('users.login');
				
			// }catch(Cartalyst\Sentry\Users\WrongPasswordException $e){
				
				// return Redirect::back()->withInput()->with('message', 'Your email or password are incorrect.');
				
			// }
		// }
		
	}

	public function getLogout(){
		Sentry::logout();

		Event::fire('user.logout');
		
		return Redirect::route('users.login');
	}

	public function index(){
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_users.index')->with(['user'=> $user]);
	}
	
	public function profile(){
		$user = User::with('customer.websites')->where(['id' => Sentry::getUser()->id])->first();

        return View::make('CMS_users.index')->with(['user'=> $user]);
	}

	public function create(){
            return View::make('users.create');
	}

	public function store(){
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

	public function show($id){
        return Response::json(User::find($id)->toArray());
	}

	public function edit($id){
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		$user = new User;

		$v = Validator::make(Input::all(), $user->rules('update'));

		if($v->fails()){
			Notification::error('Niet alle verplichte velden zijn ingevuld');
			return Redirect::route('users.index', array('id' => $id))->with('user', User::find($id))->withInput()->withErrors($v->messages());            
		}else{
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
	public function destroy($id){
		//
	}
	
	// Show View 
	public function password_forgotten(){
		return View::make('CMS_users.password_forgotten');
	}
	
	// Send email with reset code
	public function postChangePassword(){
		try{
			$email = Input::get('email');
	
			// Find the user using the user email address
			$user = Sentry::findUserByLogin($email);
			
			// Get the users realname
			$realName = $user->first_name;
			
			// Get the password reset code
			$resetCode = $user->getResetPasswordCode();
			
			$data = Input::all();
		
			Mail::send('CMS_users.resetpasswordcode', $data, function($message) use ($data, $resetCode, $realName)
			{
				$message->to($message->email = $data['email'], 'Sven')
						->subject('Reset je password');
				$message->email = $data['email'];
				$message->resetCode = $resetCode;
				$message->realName = $realName;
			});
			
			return  View::make('CMS_users.new_password');

		// Now you can send this code to your user via email for example.
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
			return Redirect::back()->withErrors($e->getMessage());
		}
	}
	
	// password verification, reset password.
	public function postResetPassword(){
		$resetCode = Input::get('resetcode');
		
		$new_password = Input::get('password');
		
		try{
			// Find the user using the resetcode
			$user = Sentry::findUserByResetPasswordCode($resetCode);

			// Check if the reset password code is valid
			if ($user->checkResetPasswordCode($resetCode)){
				// Attempt to reset the user password
				if ($user->attemptResetPassword($resetCode, $new_password)){
					Notification::success('Uw password is succesvol gewijzigd');
					// Password reset passed
					return Redirect::route('users.login');
				}
				else{
					//Notification::error('De verificatiecode komt niet overeen.');
					// Password reset failed
					return Redirect::back();
				}
			}else{
				// The provided password reset code is Invalid
			}
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
			Notification::error('De verificatiecode komt niet overeen.');
			// Password reset failed
			return Redirect::route('users.errorResetCode');
		}
	}
	
	public function errorResetCode(){
		return View::make('CMS_users.new_password');
	}
}