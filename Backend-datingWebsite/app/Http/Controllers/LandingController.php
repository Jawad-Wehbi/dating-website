<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function home(){
        $users = User::all();
        return response()->json([
            "status" => "Done",
            "data" => $users
        ]);
    }

}
