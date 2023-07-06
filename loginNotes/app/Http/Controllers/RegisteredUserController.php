<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function store(Request $request){


        //modelo User por defecto en laravel
        User::create([

            
            
            "name"=>$request->input("name"), 
            "email"=>$request->input("email"),
            "password"=>bcrypt($request->input("password"))

        ]);

        return to_route("login");
    }
}
