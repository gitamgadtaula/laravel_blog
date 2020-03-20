<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
   public function index(){
     $user=auth::user();
     $myuser=User::findOrFail($user->id);
     return view('profile.index')->with(['user'=>$user,'myuser'=>$myuser]);
   }
}
