<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;

Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){

});
    route::post('/register',[AuthController::class,'register']);
    route::post('/login',[AuthController::class,'login']);
    route::get('/home',[LandingController::class,'home']);
    route::get('/favorite',[LandingController::class,'favorite']);
    route::post('/block',[LandingController::class,'block']);