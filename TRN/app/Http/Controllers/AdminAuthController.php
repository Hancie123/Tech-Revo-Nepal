<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contacts;
use Hash;
use Session;
use App\Models\ChatModel;

class AdminAuthController extends Controller
{
    public function logincheck(Request $request){
        
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required',
            ]
            );
            

            $admin=admin::where('email','=',$request->email)->first();
            if($admin){

                if(Hash::check($request->password, $admin->password)){
                    $request->session()->put('Loginid',$admin->admin_id);
                    return redirect('/home/dashboard');
                    

                }
                else{
                    return back()->with('fail','The password does not match');
                }

                
            }
            else{
                return back()->with('fail','The user account not found!');
            }
    }

    public function dashboard(){
        $data=array();
        if(Session::has('Loginid')){
            $data=admin::where('admin_id','=',Session::get('Loginid'))->first();
            Session::put('admin_id',$data->admin_id);
            Session::put('name',$data->name);
            Session::put('email',$data->email);
            Session::put('dob',$data->dob);
            Session::put('mobileno',$data->mobileno);
            Session::put('address',$data->address);
        }
        // else{
        //     return redirect('login');
        // }
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        return view('home/dashboard',compact('data','contact','viewcontact','viewchat'));
    }

   


    public function logout(){
        if(Session::has('Loginid')){
            Session::pull('Loginid');
            return redirect('login');
        }


    }
}