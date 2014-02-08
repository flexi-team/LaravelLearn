<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAuth extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_auth';


	/**
	 * Override fillable fields
	 */
	protected $fillable = array('token', 'secret', 'token_expired_on','user_auth_id','auth_type','auth_name');

	public function scopeOfUser($query,$userID)
  {
      return $query->where('user_auth_id', '=', $userID);
  }

  public function scopeApiLogin($query)
  {
      return $query->where('auth_type','=','api_login');
  }
	

}