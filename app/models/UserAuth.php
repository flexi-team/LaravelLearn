<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAuth extends User {

	


  /*____________________________________________________________
  |
  | Scope querying with token
  | Param: @query - the query from controller, @token
  |_____________________________________________________________*/
  public function scopeHasToken($query,$token)
  {
      return $query->where('facebook_token', '=', $token);
  }



  /*____________________________________________________________
  |
  | Scope querying with user email 
  | Param: @query - the query from controller, @email
  |_____________________________________________________________*/
  public function scopebyEmail($query,$email)
  {
      return $query->where('email', '=', $email);
  }







  public static function customAuth($tokenArg=null){

    $token = Request::header('Authorization');


    if ($tokenArg!=null){
      $token = $tokenArg;

    }

    if ($token==null){

      return Response::json(array("status"=>"error","message"=>"You are not authorized!"));
    }
    else{

      // Check if token is in database
      $userAuth = UserAuth::hasToken($token)->take(1)->get()->toArray();
      
      if (count($userAuth)>0){
        $userAuth = $userAuth[0];
     
        return true;  
      
        
        
      }
      // Check with session storage
      else{
        return Response::json(array("status"=>"error","message"=>"You are not authorized!"));
        // return Auth::check();
      }

      
    }

  }
	

}