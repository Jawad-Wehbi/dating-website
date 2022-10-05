<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
            'password' => Hash::make($request->password),
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
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 120
        ]);
    }
};

