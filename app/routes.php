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

Route::get('/', function()
{
	return View::make('hello');
});

// Learn routing to home
Route::get('/product', "ProductController@showProduct");

// Test authentication 
// Tutorial - http://code.tutsplus.com/tutorials/laravel-4-a-start-at-a-restful-api--net-29785
Route::filter('auth.basic', function()
{
    return Auth::basic();
});

Route::get('/authtest',array('before'=>'auth.basic',function(){
  return View::make('hello');
}));

// Route group for API versioning
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{
    Route::resource('users', 'UserApiController');
});



//Route::post('/api/login',"UserApiController@postLogin");

// Get User Data
//Route::get('/api/users', "UserApiController@getList");
