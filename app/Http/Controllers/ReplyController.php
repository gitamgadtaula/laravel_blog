<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;


class ReplyController extends Controller
{
  public function insert(Request $req)
  {
    $mypost= new Reply;
    $mypost->reply=$req->reply;
    $mypost->comment_id=$req->comment_id;
    $mypost->user_id=$req->user_id;
    $blog_id=$req->blog_id;
    $mypost->save();
    return redirect()->back()->with('msg', 'Reply Posted');
  }
}
