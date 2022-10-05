<?php


use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'api'], function($router){
    route::post('/register',[AuthController::class,'register']);
    route::post('/login',[AuthController::class,'login']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    route::get('/home',[LandingController::class,'home']);
    route::get('/favorite',[LandingController::class,'favorite']);
    route::post('/block',[LandingController::class,'block']);
    route::post('/male',[LandingController::class,'male']);
    route::post('/female',[LandingController::class,'female']);