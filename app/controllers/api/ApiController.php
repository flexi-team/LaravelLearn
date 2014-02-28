<?php


namespace api;
use \Controller;
use \Auth;
use \Input;
use \Route;
use \Response;
use \Request;
use \Hash;

class ApiController extends Controller {

	//==============================================
	// Status Code
	//=============================================
	// 200 OK, 201 Created, 202 Accepted, 203 Non-Authoritative Information (since HTTP/1.1)
	// 204 No Content
	// 301 Moved Permanently, 302 Found, 304 Not Modified
	// 400 Bad Request, 401 Unauthorized, 404 Not Found, 403 Forbidden, 405 Method Not Allowed
	// 406 Not Acceptable, 408 Request Timeout

	private $contentType = 'application/json';

	public function baseSuccess($data,$statusCode = 200,$options=null){
		$contents = array('status' => 'success', 'response' => $data, 'options' => $options);

		$response = Response::make($contents, $statusCode);

		$response->header('Content-Type', $this->contentType);

		return $response;
	}

	public function baseError($data,$statusCode=400, $options=null){
		//$contents = Response::json(array('status' => 'error', 'response' => $data, 'options' => $options));
		$contents = array('status' => 'error', 'response' => $data, 'options' => $options);

		$response = Response::make($contents, $statusCode);

		$response->header('Content-Type', $this->contentType);

		return $response;


	}

	public function baseUnauthorized($statusCode=401){
		$contents = array('status' => 'error', 'response' => 'You Are Not Authorized');
		$response = Response::make($contents, $statusCode);

		$response->header('Content-Type', $this->contentType);

		return $response;
	}

	public function baseUnimplemented($statusCode = 400){
		$contents= array('status' => 'error', 'response' => 'This API is Not Implemented');

		$response = Response::make($contents, $statusCode);

		$response->header('Content-Type', $this->contentType);

		return $response;
	}

	public function isAuthenticated(){

		$authFlag = false;

		// Check Access Token

		// Check Remember Me

		// Check Session
	}

	//
	// Helper Method
	//

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

  

}