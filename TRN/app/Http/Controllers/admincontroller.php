<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;


class admincontroller extends Controller
{
    public function admin(){

        return view('adminregistration');
    }

    public function registrationcheck(Request $request){
        //validation
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
        $admin->password=Hash::make($request['password']);
        $admin->save();
        if($admin){
            return back()->with('success','You have registered successfully');
        }
        else {
            return back()->with('fail','Something wrong');
        }
        

    }

    //view function
    public function viewadmin(){
        $admin=admin::all();
        $data=compact('admin');
        return view('customerview')->with($data);

    }

    //delete function
    public function delete($id){
        
        $admin=admin::find($id);
        if(!is_null($admin)){
            $admin->delete();
        }
        return redirect('customerview');
        
    }
}
