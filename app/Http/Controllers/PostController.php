<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Reply;
use App\Comment;
use App\Category;
use App\PostCategory;
use Session;
use Illuminate\Support\Facades\DB;
use App\View;

class PostController extends Controller
{

    public function insert(Request $req)
    {
      $mypost= new Post;
      $mypost->title=$req->title;
      $mypost->body=$req->message;
      $mypost->user_id=auth::user()->id;
      $mypost->save();
      foreach ($req->category as $i)
      {
        $category = Category::find($i);
        $mypost->category()->attach($category);
      }

      Session::flash('msg', 'You have successfully added a post!');
      return redirect('blog');
    }

    public function fetch()
    {
      $mypost=Post::orderBy('id','desc')->paginate(4);
      $mycategory=Category::all();
      return view('blog', ['mypost'=>$mypost,'mycategory'=>$mycategory]);
    }

    public function fetchAll($blogId)
    {
      $mypost=Post::find($blogId);
      $mycategory=Category::all();

      return view('viewpost',['mypost'=>$mypost,'mycategory'=>$mycategory]);
    }

    public function update(Request $req)
    {
      // delete previous pivot element
      DB::table('category_post')
               ->where('post_id', $req->blogId)
               ->delete();
      $mypost = Post::find($req->blogId);
      $mypost->title=$req->title;
      $mypost->body=$req->message;
      $mypost->save();
      foreach ($req->category as $i)
      {
        $category = Category::find($i);
        $mypost->category()->attach($category);
      }
      return redirect()->back()->with('msg', 'Data has been updated succesfully');
    }

    public function delete($blogId)
    {
      Post::destroy($blogId);
      return redirect('blog')->with('msg', 'Data has been deleted succesfully');
    }

    public function views(Request $req)
     {
        $myView=Post::find($req->blogId);
        $myView->views=$req->views;
        $myView->save();
        return response()->json(['success' => 'succesfully updated the views']);
     }
}
