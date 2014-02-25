<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

	// Enable soft delete
	// http://laravel.com/docs/eloquent#insert-update-delete
	protected $softDelete = true;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array(
		'password',
		'facebook_token',
		'facebook_est_expired',
		'is_email_activated',
		'is_social_connected',
		'is_facebook_linked',
		'gender',
		'status'
	);



	// Put guard on some attribute
  protected $guarded = array('id');


	/**
	 * Override fillable fields
	 */
	protected $fillable = array(
    'name', 
    'email', 
    'avatar_url',
    'password',
    'facebook_name',
    'facebook_username',
    'facebook_token',
    'facebook_est_expired',
    'location',
    'latitude',
    'longitude',
    'is_email_activated',
    'is_social_connected',
    'is_facebook_linked',
    'profile_url'
  );



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
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/*____________________________________________________________
  |
  | Relationship definement between account-user and user object
  | Param: none
  |_____________________________________________________________*/
	public function accounts(){
		return $this->belongsToMany('Account','account-user');
	}

	

}