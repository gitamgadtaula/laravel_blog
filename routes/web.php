<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
  });

Route::get('/forum', function(){
  return view('layouts.forum');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/postdata','PostController@insert');
Route::get('/blog','PostController@fetch');
Route::post('/updatedata','PostController@update')->name('updatedata');
Route::get('/deletedata/{blogId}','PostController@delete')->name('deletedata');;
Route::post('/postcomment','CommentController@insert');
Route::post('/postreply','ReplyController@insert');
Route::get('/blog/{id}','PostController@fetchAll');
Route::get('/test', function(){
  return view('/viewpost1');
});
