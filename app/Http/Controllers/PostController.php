<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Reply;
use App\Comment;

class PostController extends Controller
{

    public function insert(Request $req)
    {
      $mypost= new Post;
      $mypost->title=$req->title;
      $mypost->body=$req->message;
      $mypost->user_id=auth::user()->id;
      $mypost->save();
      return redirect('blog')->with('msg', 'New blog has been added',$mypost);
    }

    public function fetch()
    {
      $mypost=Post::paginate(5);
      return view('blog', ['mypost'=>$mypost]);
    }

    public function fetchAll($blogId)
    {
      $mypost=Post::find($blogId);
      return view('viewpost',['mypost'=>$mypost]);
    }

    public function update(Request $req)
    {
      $mypost = Post::find($req->blogId);
      $mypost->title=$req->title;
      $mypost->body=$req->message;
      $mypost->save();
      return redirect()->back()->with('msg', 'Data has been updated succesfully');
    }

    public function delete($blogId)
    {
      Post::destroy($blogId);
      return redirect('blog')->with('msg', 'Data has been deleted succesfully');
    }


}
