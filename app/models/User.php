<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Cartalyst\Sentry\Users\Eloquent\User implements UserInterface, RemindableInterface 
{
    protected $guarded = array('_token');
    
    public function rules($action = 'insert')
    {
        switch($action)
        {
            case 'insert':
                $rules = array(
                    'first_name' 	=> 'required|min:1',
                    'last_name' 	=> 'required|min:1',
                    'zipcode' 		=> 'required|min:1',
                    'city' 			=> 'required|min:1',
                    'street' 		=> 'required|min:1',
                    'house_number' 	=> 'required|min:1'
                );

                break;
            case 'update':
                $rules = array(
                    'first_name' 	=> 'required|min:1',
                    'last_name' 	=> 'required|min:1',
                    'zipcode' 		=> 'required|min:1',
                    'city' 			=> 'required|min:1',
                    'street' 		=> 'required|min:1',
                    'house_number' 	=> 'required|min:1'
                );                    
                break;
            case 'login':
                $rules = array(
                    'email'			=> 'required|between:3,64|email',
        			'password' 		=> 'required|alpha_num|between:4,12'
                );                    
                break;
        }

        return $rules;
    }
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	public function customer(){
		return $this->belongsTo('Customer');
	}
}
