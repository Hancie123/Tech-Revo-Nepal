<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\ChatModel;

class ChatController extends Controller
{
    public function insertchat(Request $request){
        $request->validate([

            'message'=>'required'
 
        ]);


        $chat=new ChatModel;
        $chat->name=$request['name'];
        $chat->message=$request['message'];
        $chat->User_ID=$request['admin_id'];
        $chat->save();
        if ($chat){
                
            return back();
            
        }
        else{
                return back();
        }
        

        
    }


  
}