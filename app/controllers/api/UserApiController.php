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
| User API Controller
|_____________________________________________________________
|
| Use Case:
| Get user/ users
| Create User/Register Object
| Update User object
|_____________________________________________________________
|
|
|
|_____________________________________________________________*/
class UserApiController extends ApiController {


  /*____________________________________________________________
  |
  | Index method of user api controllers
  | param: @get
  |_____________________________________________________________*/
  public function index(){
    return $this->baseUnimplemented();
  }

	


}