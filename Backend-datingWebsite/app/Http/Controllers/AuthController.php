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
            'username'=>'required|string|unique::users',
            'email'=>'required|string|email',
            'password'=>'required|string|confirmed|min:6',
            'bio'=>'required',
            'profile_photo_URL'=>'required',
            'gender'=>'required',
            'interest'=>'required',
            'location'=>'required',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(),(400));
        }
        $user= User::create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()->json([
            'message'=>'User Successfully registered',
            'user'=>$user
        ],201);
    }
    public function login(Request $request){
        
    }
};
