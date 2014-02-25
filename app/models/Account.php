<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Account extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'account';

	
	/*____________________________________________________________
  |
  | Relationship definement between account-user and user object
  | Param: none
  |_____________________________________________________________*/
	/*public function users(){
		return $this->hasMany('AccUser','id','id');
	}*/

	

}