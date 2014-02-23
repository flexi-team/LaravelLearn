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
    //return $this->baseUnimplemented();
    $data = User::with('auth')->get()->toArray();
    return $this->baseSuccess($data);
  }





  /*____________________________________________________________
  |
  | Store/create user object
  | param: @get
  |_____________________________________________________________*/
  public function store($data){
    return $this->baseUnimplemented();
  }



  /*____________________________________________________________
  |
  | Store/create user auth object
  | param: @get
  |_____________________________________________________________*/
  public function storeUserAuth($id){
  
    if (count(User::where("id","=",$id)->take(1)->get()->toArray())>0){
      // Ok let store the authentication for that user
      $data = Input::all();
      $data['user_auth_id'] = $id;
      return $this->baseSuccess(json_decode(UserAuth::create($data),true));
    }
    else{
      return $this->baseError("User is not existed");
    }
   // return $this->baseUnimplemented();
  }


  /*____________________________________________________________
  |
  | Get user auth object
  | param: @get
  |_____________________________________________________________*/
  public function getUserAuth($id,$authId){
  
    if (count(User::where("id","=",$id)->take(1)->get()->toArray())>0){
      $data = UserAuth::ofUser($id)->where("user_auth_id","=",$authId)->take(1)->get()->toArray();
      return $this->baseSuccess($data);
    }
    else{
      return $this->baseError("Sorry User is not existed");
    }
   // return $this->baseUnimplemented();
  }



	


}