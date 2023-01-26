<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class MessageController extends Controller
{
    public function messages(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewallmessages=contacts::all();
        return view('home/messages',compact('contact','viewcontact','viewallmessages'));
        
    }

    public function deletemessage($messageid){
        $message=contacts::find($messageid);
        if (!is_null($message)){
            $message->delete();
            return redirect('/home/messages')->with('messagesuccess',"Message is deleted successfully");
            
        }
        else{
            return redirect('/home/messages')->with('messagefail',"Error Occurred");
            
        }
            
        
        
    }
}