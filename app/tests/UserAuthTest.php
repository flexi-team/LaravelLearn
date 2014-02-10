<?php

/*____________________________________________________________
|
| User Auth Test Case
|_____________________________________________________________
|
| Use Case:
| #0 Test Logout
| #1 Test trying to access /api/v1/users with no token
| #2 Test api login to /api/v1/api-login (Success)
| 	 Test trying to access to /api/v1/users with returned token
|	#3 Test try to login with wrong credentrail
|_____________________________________________________________
|
|
|
|_____________________________________________________________*/
class UserAuthTest extends TestCase {


	/*____________________________________________________________
  |
  | TestCase - Case 1
  |_____________________________________________________________
  | Trying to access to /authtest with no token
  |_____________________________________________________________*/
	public function testAccessUserWithNoToken()
	{

    // Enable filter for this auth test
    $this->app['router']->enableFilters();

		// Logout first
		$response = $this->call('GET', '/api/v1/api-logout');
    // Test request to access user list
		$response = $this->call('GET', '/api/v1/users');
    // Test request is not authorized
		$this->assertTrue(strpos($response->getContent(),"You are not authorized")!==false);
	}


  /*____________________________________________________________
  |
  | TestCase - Case 2
  |_____________________________________________________________
  | Trying to access to /api/v1/api-login to login with email/pw
  |_____________________________________________________________*/
  public function testUserLogin()
  {
    
    // Test request to login
    $response = $this->call('POST', '/api/v1/api-login',array("email"=>"admin@admin.com" , "password"=>"123"));
    // Test request is not authorized
    $this->assertTrue(strpos($response->getContent(),"You has been logged in Successfully!")!==false);
  }

  /*____________________________________________________________
  |
  | TestCase - Case 3
  |_____________________________________________________________
  | Trying to access to /api/v1/api-login to login with email/pw
  |_____________________________________________________________*/
  public function testUserAccessWithToken()
  {
    
    // Test request to login
    $response = $this->call('POST', '/api/v1/api-login',array("email"=>"admin@admin.com" , "password"=>"123"));
    $loginResult = json_decode($response->getContent(),true);
    
    $token = $loginResult["response"]["api"];

    // Test request to access user list
    $response = $this->call('GET', '/api/v1/users',[],[],["Authorization"=>$token]);
    
    // Test request is not authorized
    $this->assertTrue(count(json_decode($response->getContent(),true))>=2);
  }

}