<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class AccUser extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'account-user';

	/**
	 * Override fillable fields
	 */
	protected $fillable = array(
    'status',
    'account_id',
    'user_id'
  );


	// Hidden field from db
	protected $hidden = array(
		'status'
	);
	
	/*____________________________________________________________
  |
  | Relationship definement between account-user and user object
  | Param: none
  |_____________________________________________________________*/
	/*public function accounts(){
		return $this->hasMany('AccUser','user_id','id');
	}*/

	

}