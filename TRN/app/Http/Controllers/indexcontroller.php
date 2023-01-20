<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexcontroller extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function registration(Request $request){
        
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required',
            ]
            );
            print_r($request->all());
    }
}
