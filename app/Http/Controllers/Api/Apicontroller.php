<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Apicontroller extends Controller
{
    //Register API (Post)
    public function register(Request $request){
        //Data validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed",
        ]);
    //create user
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        return response()->
        json([
            "status" =>1,
            "message" =>"User created successfully"
        ])
            ->withCallback($request->input('callback'));

    }
    //Login API(POST)
    public function login(Request $request){
        //Data Validation
        $request->validate([
            "email"=> "required|email",
            "password"=>"required"
        ]);
        //Checking User login
        if(Auth::attempt([
           "email"=>$request->email,
           "password"=> $request->password
        ])){
            //User exists
            $user = Auth::user();
            $token = $user->createToken("myToken")->accessToken;

            return view('auth',[
                "status"=>true,
                "message"=> "User logged in successfully",
                "token"=> $token
            ]);
        }else{
            return response()->json([
                "status"=>false,
                "message"=>"Invalid login details"
                ]);
        }
    }

    //Profile API (GET)
    public function profile(){
        $user =Auth::user();
        return response()->json([
            "status"=>true,
            "message"=> "Profile information",
            "data"=>$user
            ]);
    }

    //Logout API (post)
    public function logout(){
            auth()->user()->token()-revoke();
            return view('auth',[
                "status"=>true,
                "message"=>"User Logged out"
            ]);

    }
}
