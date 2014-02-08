<?php

class UserApiController extends ApiController {

  /*
    Index method of user api controllers
  */
  public function index(){
    return $this->baseUnimplemented();
  }

	/* ============================================
		Get all user list
		============================================= */
	public function getList(){
    if (Auth::guest()){
      return $this->baseUnauthorized();
    }
    else{
      $user = User::all();
      return $this->baseSuccess($user);
    }
		
	}


}