<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function insert(Request $req)
    {
      $mypost= new Comment;
      $mypost->comment=$req->comment;
      $mypost->user_id=$req->user_id;
      $mypost->post_id=$req->post_id;
      $mypost->save();
      echo "posted succesfully";
      return redirect()->back()->with('msg', 'comment Posted');
    }
}
