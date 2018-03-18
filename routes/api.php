<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('category', 'CategoryController');
Route::resource('location', 'LocationController');
Route::resource('product', 'PostController');
Route::resource('user', 'UserController');
Route::resource('auth', 'AuthController');

Route::post('register', [
    'uses' => 'SingUpController@postSignUp',
    'as' => 'signup'
]);

Route::post('login', [
    'uses' => 'SignInController@postLogin',
    'as' => 'login'
]);
Route::get('profile',[
    'uses'=>'SignInController@getProfile',
    'as'=>'getProfile'
]);



