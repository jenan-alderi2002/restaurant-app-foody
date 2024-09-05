<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\tokens;
use Illuminate\Http\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
       
public function register(Request $request)
{
   $fields=$request->validate([
'name'=>'required|string',
'email'=>'required|string|unique:users,email',
'password'=>'required|string|confirmed',
//'phone'=>'required|string',

   ]);
 $user=User::create([
   'name'=>$fields['name'],
   'email'=>$fields['email'],
   'password'=>bcrypt($fields['password']),
  // 'phone'=>$fields['phone'],
   
 ]);


  $token=$user->createToken('myapptoken')->plainTextToken;
  $response=[
      'user'=>$user,
      'token'=>$token,
      'message' => 'success',

  ];

  return response($response,201);


}
public function login(Request $request)
{
   $fields=$request->validate([

'email'=>'required|string',
'password'=>'required|string',

   ]);
 //check email
 $user= User::where('email', $fields['email'])->first();
//check password
if(!$user||!Hash::check($fields['password'],$user->password))
{
   return response([
    'message'=>'Bad creds'
   ],401  );



}
  $token=$user->createToken('myapptoken')->plainTextToken;
  $response=[
      'user'=>$user,
      'token'=>$token,
      'message' => 'success',

  ];

  return response($response,201);

}

  public function logout(Request $request){
$request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'success'
        ], 200);
    
    }

}
