<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\password;


class PasswordController extends Controller
{
    public function password(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
            'category'=>'required'
        ]);

        $password=new Password;
        $password->email=$request['email'];
        $password->password=$request['password'];
        $password->url=$request['category'];
        $password->admin_id=$request['admin_id'];
        $password->save();
        if ($password){
            return back()->with('success','You have saved the password successfully');
            
        }
        else{
            return back()->with('fail','Error Occurred');
        }
        

        
    }

    public function viewpassword(){
        $password=password::all();
        $data=compact('password');
        return view('/home/passwords')->with($data);
        
        
    }

    //delete function
    public function deletepassword($id){
        
        $password=password::find($id);
        if(!is_null($password)){
            $password->delete();
            return redirect('/home/passwords')->with('passwordsuccess',"Password is deleted successfully");
        }
        else{
            return redirect('/home/passwords')->with('passwordfail',"Error Occurred");
        }
        
        
    }
}