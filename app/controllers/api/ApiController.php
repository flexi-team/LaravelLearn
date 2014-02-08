<?php


//namespace Api;

class ApiController extends Controller {

	
	public function baseSuccess($data,$options=null){
		return Response::json(array('status' => 'success', 'response' => $data, 'options' => $options));
	}

	public function baseError($data,$options=null){
		return Response::json(array('status' => 'error', 'response' => $data, 'options' => $options));
	}

	public function baseUnauthorized(){
		return Response::json(array('status' => 'error', 'response' => 'You Are Not Authorized'));
	}

	public function baseUnimplemented(){
		return Response::json(array('status' => 'error', 'response' => 'This API is Not Implemented'));
	}

}