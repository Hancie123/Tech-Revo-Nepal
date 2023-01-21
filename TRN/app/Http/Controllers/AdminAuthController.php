<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Session;

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
                    $request->session()->put('loginid',$admin->admin_id);
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
}
