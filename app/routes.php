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
Route::get('/login', "UserController@getLogin");

Route::get('/user', "UserController@getUser");

Route::get('/ui', "UIController@index");

Route::get('/dashboard', "DashboardController@index");

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


// Filter custom auth
Route::filter('custom.auth',function(){
    // Check authentication with api login with token or session
    $hasAccess = UserAuth::customAuth();
    // If the returned response is not true aka the error message, print that message
    
    if ($hasAccess===true){
        
    }
    else{
        return $hasAccess;
    }

});

Route::get('/authtest',array('before'=>'custom.auth',function(){
  return "Your Are Authorized!";
}));

/*______________________________________________________________
|
| Route group for API versioning for non-required login
|_______________________________________________________________*/
Route::group(array('prefix' => 'api/v1'), function()
{
    //Route::resource('users', '\api\UserApiController');
    Route::resource('auth', 'AuthApiController');

    // Login from web
    Route::post('login', array('before' => 'csrf','\api\AuthApiController@login'));
    // Login from Ajax or Mobile
    Route::post('api-login','\api\AuthApiController@apiLogin');
    // Logout from Mobile or API (Ajax call)
    Route::get('api-logout','\api\AuthApiController@apiLogout');

    // User API
    
    Route::resource('users', '\api\UserApiController');
    // User Avatar API
    Route::post('users/{userHandle}/avatar','\api\UserApiController@storeAvatar');
});


/*______________________________________________________________
|
| Route group for API versioning for required authentication
|_______________________________________________________________*/
Route::group(array('prefix' => 'api/v1','before'=>'custom.auth'), function()
{
    //Route::resource('users', '\api\UserApiController');

    // Store user auth
    Route::post('users/{userHandle}/authentication','\api\UserApiController@storeUserAuth');
    // Get user auth by specific id
    Route::get('users/{userHandle}/authentication/{userAuthHandle}','\api\UserApiController@getUserAuth');

});

