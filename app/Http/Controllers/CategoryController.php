<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\Reply;
use App\Category;

class CategoryController extends Controller
{
    //
    public function addCategory(Request $req)
    {
      $mypost= new Category;
      $mypost->category=$req->category;
      $mypost->save();
      return redirect('home')->with('msg', 'New category has been added');
    }
}
