<?php

namespace api;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use \api\ApiController;
use \Hash;
use \User;
use \UserAuth;
use \Response;

/*____________________________________________________________
|
| Auth API Controller
|_____________________________________________________________
|
| Use Case:
| #1 User login with username/email and password from website
| #2 User login with token of social such as facebook or g+
| #3 User login with username/email and password from mobile/api
| #4 User logout from mobile/api
|_____________________________________________________________
|
|
|
|_____________________________________________________________*/
class AuthApiController extends ApiController {

  /*
    Index method of user api controllers
  */
  public function index(){
    return $this->baseUnimplemented();
  }


  /*____________________________________________________________
  |
  | Logout Action for Use Case #4
  | param: none
  |_____________________________________________________________*/
  public function apiLogout(){

    if (Auth::check()){
      $userID = Auth::user()->id;

      // Logout from Auth
      Auth::logout();

      // Logout from api
      $user = UserAuth::ofUser($userID)->apiLogin();
      $user->update(
        array(
          "token" => "",
          "token_expired_on" => ""
        )
      );
      return $this->baseSuccess("You Are Now Logout!");
    }
    else{
      return $this->baseError("You Are Already Logout!");
    }
    
    
  }

	
  /*____________________________________________________________
  |
  | Login Action for Use Case #3
  | param: none
  |_____________________________________________________________*/
  public function apiLogin(){

    // Login with email and password
    if (Input::has('email') && Input::has('password')){
      
      $email = Input::get('email');
      $pass = Input::get('password');
      if (Auth::attempt(
          array(
            'email'       =>  $email,
            'password'    =>  $pass,
            'status' =>  'act'
          ),true
        )
      ){

        $user = User::byEmail($email)->take(1)->get()->toArray();
        // Auth Attempt With Success and generate token
        return $this->baseSuccess(array(
          "user" => $user[0],
          "message" => "You has been logged in Successfully!"
        ));
      }
      else{
        // Auth Attemp with error
        return $this->baseError("Authentication Info Is Not Valid!");
      }
    }
    else if (Input::has('token')){
      $result =  UserAuth::customAuth(Input::get('token'));

      if ($result){

        $user = User::hasToken(Input::get('token'))->take(1)->get()->toArray();

        return $this->baseSuccess(array(
          "user" => $user[0],
          "message" => "You has been logged in Successfully!"
        ));
      }
      else{
        return $this->baseError("Authentication Info Is Not Valid!");
      }
    }
    else{
      return $this->baseError("Login Cannot Be Proceeded!");
    }
    
  }

  /*____________________________________________________________
  |
  | Generate and store API and temp expiration date 
  | Param: @email
  |_____________________________________________________________*/
  private function storeToken($email){
    // Get User Id
    $user = User::where("email","=",$email)->take(1)->get()->toArray();
    $user = $user[0];
    if ($user){

      $userID = $user['id'];
      // Check if user auth is stored 

      $userAuth = UserAuth::ofUser($userID)->apiLogin()->take(1)->get()->toArray();



      $token = md5($email . ":" . $this->generateRandomString() . ":pass");
      $timestamp = $this->getTimestamp("P3D");

      // If User Auth is Existed
      if (count($userAuth)>0){
        $userAuth = $userAuth[0];
        // Update Token and expiration to user auth
        $userAuthID = $userAuth['id'];
        // Update to Auth
        UserAuth::where('id','=',$userAuthID)->update(array("token" => $token,"token_expired_on"=>$timestamp));
      }
      else{

        UserAuth::create(
          array(
            "token" => $token,
            "token_expired_on"=>$timestamp,
            "user_auth_id"=>$userID,
            "auth_type" => "api_login",
            "auth_name" => $email

          )
        );
        
      }

      return $token;

    }
    else{
      return 'NullUserDataToken';
    }
    
  }

  /*____________________________________________________________
  |
  | Login Action for Use Case #1
  | param: @email, @password
  |_____________________________________________________________*/
  public function login(){

    // Check Is User Login, Redirect to dashboard
    if (Auth::check()){
      return Redirect::intended('dashboard');
    }

    if (Input::has('email') && Input::has('password')){
      
      $rememberMe = Input::has('remember')?Input::get('remember'):false;

      if (Auth::attempt(
          array(
            'email'       =>  Input::get('email'),
            'password'    =>  Input::get('password'),
            'status_code' =>  '1'
          ),
          $rememberMe
        )
      ){

        // Auth Attempt With Success and Redirect To Page dashboard
        return Redirect::intended('dashboard');
      }
      else{
        // Auth Attemp with error, redirect to login with message error
        Redirect::to('/login')->with('message', 'Login Failed');
      }
    }
    else{
      // Auth Attemp with error, redirect to login with message error
      Redirect::to('/login')->with('message', 'Login Failed');
    }
    
  }

  /*____________________________________________________________
  |
  | Utility: Random String
  | param: @length = 10
  |_____________________________________________________________*/
  public function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
  }

  /*____________________________________________________________
  |
  | Utility: Get Current Timestamp
  | param: @interval 
  |_____________________________________________________________*/
  public function getTimestamp($interval,$inc=true) {
    date_default_timezone_set ("UTC");
    
    $date = new \DateTime();

    if ($interval!=null){
      if ($inc==true){
        $date->add(new \DateInterval($interval)); //add intervals  
      }
      else{
        $date->sub(new \DateInterval($interval));
      }
      
    }
     
    
    $timestamp = date_timestamp_get($date);
    return $timestamp;

  }
}