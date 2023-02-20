<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\ChatModel;
use App\Models\AnnouncementModel;

class MessageController extends Controller
{
    public function messages(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewallmessages=contacts::all();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        return view('home/messages',compact('contact','viewcontact','viewallmessages','viewchat','announce','announceall'));
        
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