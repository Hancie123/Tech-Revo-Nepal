<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class admincontroller extends Controller
{
    public function admin(){

        return view('adminregistration');
    }

    public function registrationcheck(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'password'=>'required',
            'address'=>'required',
            'date'=>'required',
        ]);

        
        //insert query
        $admin=new Admin;
        $admin->name=$request['name'];
        $admin->dob=$request['date'];
        $admin->email=$request['email'];
        $admin->mobileno=$request['mobile'];
        $admin->address=$request['address'];
        $admin->password=md5($request['password']);
        $admin->save();

    }
}
