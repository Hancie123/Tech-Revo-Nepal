<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function storecontact(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required',
            ]
            );
            $contact=new Contacts;
            $contact->name=$request['name'];
            $contact->email=$request['email'];
            $contact->subject=$request['subject'];
            $contact->message=$request['message'];
            $contact->save();
            if ($contact){
                
                return back()->with('success','The message is send successfully');
            
            }
            else{
                return back()->with('fail','Error Occurred');
            }
            
        
    }
}