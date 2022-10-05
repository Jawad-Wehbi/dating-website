<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Factory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{   
    public function __construct(){
        $this->middleware('auth:api',['except'=>['login','register']]);      
    }

    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required|string|email',
            'password'=>'required|string|min:6',
            'bio'=>'required',
            'profile_photo_URL',
            'gender'=>'required',
            'interest'=>'required',
            'location'=>'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors().(400));
        }
        $user= User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'bio' => $request->bio,
            'profile_photo_URL' => $request->profile_photo_URL,
            'gender' => $request->gender,
            'interest' => $request->interest,
            'location' => $request->location,

        ]);

        return response()->json([
            'message'=>'User Successfully registered',
            'user'=>$user
        ],201);
    }
    public function login(Request $request){
        
    }
};
