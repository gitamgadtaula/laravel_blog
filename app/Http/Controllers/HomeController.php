<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mycategory=Category::all();
        $mypost=Post::all();
        $myuser=User::all();
        if(!\Gate::allows('isAdmin'))
        {
          // abort(403,"sorry only authorized admin can access");
        }
        return view('home',['mypost'=>$mypost,'myuser'=>$myuser,'mycategory'=>$mycategory]);
    }
}
