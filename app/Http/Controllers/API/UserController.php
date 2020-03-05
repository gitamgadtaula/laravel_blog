<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class UserController extends Controller
{
  public $successStatus = 200;/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
     public function login(){

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            ]);
if ($validator->fails())
{
  return response()->json(['error'=>$validator->errors()], 401);
}
$input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $activation_token =  $user->createToken('MyApp')-> accessToken;

          User::where('email',$request->email)->update([
            'activation_token' =>$activation_token
          ]);

        $success['token'] =  $activation_token;
        $success['name'] =  $user->name;

return response()->json(['success'=>$success], $this-> successStatus);
    }
/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function userActivate($activation_token){


      $user = User::where('activation_token',$activation_token);

      $is_exist = clone $user;

      $msg = "success";
      $status = true;

      if($is_exist->count()>0){
        $user->update(['activation_token' => null]);
      }else{
        $msg = "User already activated or does not exist.";
        $status = true;

      }

      return response()->json(['msg'=>$msg,'status'=>$status]);

    }
}
