<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    public function admin(){

        return view('adminregistration');
    }

    public function registrationcheck(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'password'=>'required',
            'address'=>'required',
            'date'=>'required',
        ]);

    }
}
