@extends('layouts.backend.default')

@section('content')

  <div ng-controller="loginController" ng-cloak>


    <div class="backend-login">
      
      <div class="backend-login-header">
        
      </div>
      <div class="backend-login-body">
        
        <div class="input-group" >
          <div class="input-addon">
            <span class="glyphicon glyphicon-user"> </span>
          </div>
          <input class="input-box-dark"/>
        </div>

        <div class="input-group">
         <div class="input-addon">
            <span class="glyphicon glyphicon-lock"> </span>
          </div>
          <input class="input-box-dark"/>
        </div>

        <div class="button-group">
          <div class="each-button">Sign In</div>
        </div>

        <div class="link-group">
          <div class="left-link">
            <a href="#">Go to Shopping home page!</a>
          </div>
        </div>


      </div>

    </div>


  </div>


@stop
