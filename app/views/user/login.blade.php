@extends('layouts.front-end.default')

@section('content')

  <div class="container" ng-controller="loginController" ng-cloak>


    <div class="col-md-6 col-md-offset-3">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Ready to get you product sold! Login here!</h3>
        </div>
        <div class="panel-body login-form">
          <div class="input-group login-form-email-control">
            <span class="input-group-addon login-form-group-addon">Email</span>
            <input  type="text" class="form-control" placeholder="Email"
                    ng-model="user.email">
          </div>

          <div class="input-group login-form-password-control">
            <span class="input-group-addon login-form-group-addon">Password</span>
            <input  type="password" class="form-control" placeholder="Password" 
                    ng-model="user.password">
          </div>

          <div class="login-form-buttons">
            <button type="button" class="btn btn-default col-xs-6 col-sm-6 col-md-6" 
                    ng-click="login()">Login</button>
            <button type="button" class="btn btn-primary col-xs-6 col-sm-6 col-md-6">Signup with Facebook</button>
          </div>


        </div>
      </div>
    </div>


  </div>


@stop
