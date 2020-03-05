<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use Auth;
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
}
