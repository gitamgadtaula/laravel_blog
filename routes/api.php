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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::get('activate/{activation_token}', 'API\UserController@userActivate');

Route::middleware('auth:api')->get('list', 'ApiController@api');
Route::middleware('auth:api')->get('list/{id}','ApiController@fetch');
Route::middleware('auth:api')->post('insert','ApiController@insert');
Route::middleware('auth:api')->get('list/{id}/comments','ApiController@comments');
// Route::get('list/{id}','ApiController@fetch');
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'API\UserController@details');
// });
