<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

// Learn routing to home
Route::get('/product', "ProductController@showProduct");

// Route to home
Route::get('/', "HomeController@showHome");
Route::get('/login', "HomeController@showLogin");

// Test authentication 
// Tutorial - http://code.tutsplus.com/tutorials/laravel-4-a-start-at-a-restful-api--net-29785
/*Route::filter('auth.basic', function()
{
    return Auth::basic("email");
});

Route::get('/authtest',array('before'=>'auth.basic',function(){
  return View::make('hello');
}));
*/
// Route group for API versioning
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('users', 'UserApiController');
    Route::resource('auth', 'AuthApiController');

    // V1 Custom Authentication
    //Route::post('login', '\api\AuthApiController@login');
    // Login from web
    Route::post('login', array('before' => 'csrf','\api\AuthApiController@login'));
    // Login from Ajax or Mobile
    Route::post('api-login','\api\AuthApiController@apiLogin');
});



//Route::post('/api/login',"UserApiController@postLogin");

// Get User Data
//Route::get('/api/users', "UserApiController@getList");
