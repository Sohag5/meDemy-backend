<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{


 protected $user;
 
 public function __construct()
 {
   $this->user = new User;
 }


 public function register(Request $request)
 {
  $validator = Validator::make($request->all(),
    [
      'first_name'=>'required|string',
      'last_name'=>'required|string',
      'phone' => 'required|min:11|max:11',
      'role' => 'required',
      'email'=>'required|email|unique:users',
      'password'=>'required|string|min:6',
    ]);

  if($validator->fails())
  {
   return response()->json([
     "status_code"=>2000,
     "success"=>false,
     "message"=>$validator->messages()->toArray(),
   ],400);
 }


 $registerComplete = $this->user::create([
  'first_name'=>$request->first_name,
  'last_name'=>$request->last_name,
  'role'=>$request->role,
  'phone'=>$request->phone,
  'email'=>$request->email,
  'password'=> Hash::make($request->password), 
]);
 

 if($registerComplete)
 {
   return $this->login($request);
 }   
}


public function login(Request $request)
{
 $validator = Validator::make($request->only('email','password'),
   [
    'email'=>'required|email',
    'password'=>'required|string|min:6',
  ]
);

 if($validator->fails())
 {
   return response()->json([
    "status_code"=>2000,
     "success"=>false,
     "message"=>$validator->messages()->toArray(),
   ],400);
 }

 $jwt_token = null;

 $input = $request->only("email","password");

 if(!$jwt_token = auth('users')->attempt($input))
 {
  return response()->json([
    "status_code"=>3000,
    'success'=>false,
    'message'=>'Invalid email or password'
  ]);

}

return response()->json([
 "status_code"=>2000,
 'success'=>true,
 'token'=>$jwt_token,
]);
}






}