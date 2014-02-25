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
use \Validator;
use \AccUser;
use Underscore\Types\Arrays;

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
| Example: http://laravel.com/docs/controllers#restful-controllers
|
|_____________________________________________________________*/
class UserApiController extends ApiController {


  /*____________________________________________________________
  |
  | Index method of user api controllers.
  | Path: GET /api/v1/user
  | param: @get
  |_____________________________________________________________*/
  public function index(){
    //return $this->baseUnimplemented();
    $data = User::with('accounts')->get()->toArray();
    return $this->baseSuccess($data);
  }


  /*____________________________________________________________
  |
  | Index method of user to get user by id
  | Path: GET /api/v1/user
  | param: @get
  |_____________________________________________________________*/
  public function show($id){
    //return $this->baseUnimplemented();
    $data = User::where('id','=',$id)->with('accounts')->get()->toArray();
    return $this->baseSuccess($data);
  }



  /*____________________________________________________________
  |
  | Unimplemented method - resource.create
  | Path: GET /api/v1/user/create
  | param: @get
  |_____________________________________________________________*/
  public function create(){
    return $this->baseUnimplemented();
    
  }


  /*____________________________________________________________
  |
  | Store/create user object
  | param: @get
  | Resouces: http://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers
  |_____________________________________________________________*/
  public function store(){

    // Validate data
    // read more on validation at http://laravel.com/docs/validation
    $rules = array(
      'name'       => 'required',
      'email'      => 'required|email',
      'password'   => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    // If error on validated
    if ($validator->fails()) {
      return $this->baseError("Name and Email and Password are Required.");
    }else{

      // try catch save error data
      try{
        $data = Input::all();

        $data['password'] = Hash::make($data['password']);

        $result = User::create($data);

        // Check that the data has attached with accounts id to attached or not
        if (isset($data['accounts']) && is_array($data['accounts'])){
          // Attach account to user
          // Add attribute to data
          $accountsData = array();
          foreach ($data['accounts'] as $key => $value) {
            $accountsData[$value]= array('status' => 'act' );
          }

    
          $result->accounts()->sync($accountsData);
          

        }

        $result = $result->toArray();

        // Get user object with id from above and with accounts pivot
        $result = User::where('id','=',$result['id'])->with("accounts")->get()->toArray();

        return $this->baseSuccess($result,201);
      }
      catch(\Exception $e){
        return $this->baseError("Insert fail");
      }
      
    }

    
  }



  /*____________________________________________________________
  |
  | Store/create user object
  | param: @get
  |_____________________________________________________________*/
  public function update($id){

    // Find user object with the id above
    $data = User::find($id);

    if (is_object($data) && $data->exists){
      // Validate the data
      $rules = array(
        'email'      => 'email'
      );

      $validator = Validator::make(Input::all(), $rules);

      // If error on validated
      if ($validator->fails()) {
        return $this->baseError("Incorrect data.");
      }else{

        // try catch save error data
        try{


          // Param
          $param = Input::all();

          // Update the model
          $result = $data->update($param);

          // Check if the account is updated too
          if (isset($param['accounts']) && is_array($param['accounts'])){
            // Attach account to user
            // Add attribute to data
            $accountsData = array();
            foreach ($param['accounts'] as $key => $value) {
              $accountsData[$value]= array('status' => 'act' );
            }

      
            $data->accounts()->sync($accountsData);
            

          }

          // Get user object with id from above and with accounts pivot
          $result = User::where('id','=',$id)->with("accounts")->get()->toArray();

          return $this->baseSuccess($result,200);

        }catch(\Exception $e){
          return $this->baseError("Update fail!");
        }
      }
      
    }
    else{
      return $this->baseError("The User is Not Existed");
    }

    

  }



   /*____________________________________________________________
  |
  | Delete user object
  | param: @id
  |_____________________________________________________________*/
  public function destroy($id){


    $data = User::find($id);

    if (is_object($data) && $data->exists){

      try{


        // Remove USer and User account completedly from database
        $affectedRows = AccUser::where("user_id","=",$id)->delete();
        $affectedRows = $affectedRows + User::destroy($id);

        if ($affectedRows>0){
          return $this->baseSuccess("Remove Successfully");
        }
        else{
          return $this->baseError("Remove Fail"); 
        }
        // Soft remove user


      }
      catch(\Exception $e){
        return $this->baseError("Remove Fail"); 
      }

      


    }
    else{


      return $this->baseError("Remove Fail. No User with this id"); 

    }
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