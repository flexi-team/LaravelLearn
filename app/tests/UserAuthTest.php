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
		//$crawler = $this->client->request('GET', '/api/v1/users');
		// Logout first
		$response = $this->call('GET', '/api/v1/api-logout');

		$response = $this->call('GET', '/api/v1/users');
		//$this->assertViewHas('You are not authorized!');
		echo $response->getContent();
		$this->assertTrue(strpos($response->getContent(),"You are not authorized")!==false);
	}

}