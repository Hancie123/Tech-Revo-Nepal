<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Admin;
use App\Models\ChatModel;

class ProfileController extends Controller
{

    public function profile(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $user=Admin::all();
        return view('home/profile',compact('contact','viewcontact','viewchat','user'));
    }

    public function editprofile(Request $request,$id){
        
        $request->validate(
            [
               'yourname'=>'required',
               'address'=>'required',
               'phone'=>'required',
               'email'=>'required' 
            ]
            );

        $profile=Admin::find($id);
        $profile->name=$request['yourname'];
        $profile->email=$request['email'];
        $profile->mobileno=$request['phone'];
        $profile->address=$request['address'];
        $profile->update();
        if ($profile){
            return redirect('/login')->with('success','The profile detail is updated');
            
        }
        else{
            return redirect('/login')->with('fail','Error Occurred');
        }
        
    }
    
    
}