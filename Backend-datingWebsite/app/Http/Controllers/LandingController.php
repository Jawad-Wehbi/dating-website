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

    public function male(){
        $users = User::
                    where('gender','male')
                    ->get();
        return response()->json([
            "status" => "Done",
            "data" => $users
        ]);
    }

    public function female(){
        $users = User::
                    where('gender','female')
                    ->get();
        return response()->json([
            "status" => "Done",
            "data" => $users
        ]);
    }

    public function favorite(){
        return  DB::table("users")
                        ->join("favorites","id","=","favorite_id")
                        ->select("users.*")
                        ->get();
    
    }


    function block(Request $request){
        DB::table('blocks')->insert(
            ['uesr_id' => $request->uesr_id ,
             'blocked_id' => $request->blocked_id]
        );
    }

}