<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
// use App\user;

class ApiController extends Controller
{

    public function api()
    {
      return Post::all();
    }

    public function fetch($id)
    {
      return Post::find($id);
    }

    public function insert(Request $req)
    {
      $mypost= new Post;
      $mypost->title=$req->title;
      $mypost->body=$req->body;
      $mypost->user_id=auth::user()->id;
      $mypost->save();
      return response()->json(['success' => 'succesfully added via api']);
    }

    public function comments($id)
    {
      $mycomment=Post::find($id)->comment;
      return response()->json([$mycomment,'System message'=>'Fetched from an api']);
    }

}
