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
Route::post('/addcategory','CategoryController@addCategory');
Route::post('/viewcounter','PostController@views');
Route::get('/test', function(){
  return view('/viewpost1');
});

//spatie role manager
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});

//Api UI
Route::get('/apiregister',function(){
  return view('api.register');
});

Route::get('/apilogin', function(){
  return view('api.login');
});
Route::get('/maps', function(){
  return view('maps.maps');
});

Route::get('/image','ImageController@index');
Route::post('/uploadimage',"ImageController@update");
Route::get('/downloadpdf','PDFController@exportpdf');
Route::get('/downloadxls','PDFController@exportxls');
Route::get('/profile','ProfileController@index');
