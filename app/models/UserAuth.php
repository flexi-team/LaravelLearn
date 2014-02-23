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

  // Put guard on some attribute
  protected $guarded = array('id');


	/**
	 * Override fillable fields
	 */
	protected $fillable = array('token', 'secret', 'token_expired_on','user_auth_id','auth_type','auth_name');

  /*____________________________________________________________
  |
  | Scope querying condition
  | Param: @query - the query from controller, @userID
  |_____________________________________________________________*/
	public function scopeOfUser($query,$userID)
  {
      return $query->where('user_auth_id', '=', $userID);
  }

  public function scopeApiLogin($query)
  {
      return $query->where('auth_type','=','api_login');
  }

  /*____________________________________________________________
  |
  | Scope querying with token
  | Param: @query - the query from controller, @token
  |_____________________________________________________________*/
  public function scopeHasToken($query,$token)
  {
      return $query->where('token', '=', $token);
  }

  /*____________________________________________________________
  |
  | Scope querying with expiration
  | Param: @query - the query from controller, @token
  |_____________________________________________________________*/
  public function scopeTokenNotExpired($query)
  {
    date_default_timezone_set ("UTC");
    
    $date = new \DateTime();   
    
    $timestamp = date_timestamp_get($date);

    return $query->where('token_expired_on', '>', $timestamp);
  }

  /*____________________________________________________________
  |
  | Relationship definement between auth and user object
  | Param: none
  |_____________________________________________________________*/
  public function user()
  {
      return $this->belongsTo('User','user_auth_id','id');
  }


  public static function customAuth(){

    $token = Request::header('Authorization');

    if ($token==null){

      return Response::json(array("status"=>"error","message"=>"You are not authorized!"));
    }
    else{

      // Check if token is in database
      $userAuth = UserAuth::apiLogin()->hasToken($token)->tokenNotExpired()->take(1)->get()->toArray();
      
      if (count($userAuth)>0){
        $userAuth = $userAuth[0];
        return true;//Response::json(array("data"=>$userAuth,"token"=>$token));
        
      }
      // Check with session storage
      else{
        return Response::json(array("status"=>"error","message"=>"You are not authorized!"));
        // return Auth::check();
      }

      
    }

  }
	

}