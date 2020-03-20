<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Http\UploadedFile;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UploadTrait;

class ImageController extends Controller
{
    public function index()
    {
      $user=auth::user();
      return view('image.index')->with(['user'=>$user]);
    }

    public function update(Request $request)
    {
      $request->validate([
           'profile_image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);

      $user = User::findOrFail(auth()->user()->id);

      if ($request->has('profile_image'))
      {
        $user = Auth::user();
        $avatarName = $user->id.'_avatar'.time().'.'.request()->profile_image->getClientOriginalExtension();
        $request->profile_image->storeAs('avatars',$avatarName);
        $user->profile_image = $avatarName;
        $user->save();
      }


      return Redirect()->back()->with(['msg' => 'Profile updated successfully.']);


    }
}
