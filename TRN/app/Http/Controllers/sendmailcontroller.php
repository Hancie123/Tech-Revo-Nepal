<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\ChatModel;
use App\Models\AnnouncementModel;
use Mail;

class sendmailcontroller extends Controller
{
    public function index(){

        

        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        
        // $data=['name'=>"Hancie",'data'=>"Hello Hancie"];
        // $user['to']='nitesh0hamal@gmail.com';
        // Mail::send('emailtemplates/sendmails',$data,function($message) use ($user){
        //     $message->to($user['to']);
        //     $message->subject('Hello');
        // });

        return view('home/sendemail',compact('contact','viewcontact','viewchat','announce','announceall'));

        
    }

    public function sendemail(Request $request){

        $request->validate([

            'email'=>'required',
            'subject'=>'required',
            'emailmessage'=>'required',
            
        ]
            
        );

        $data = [
                
            'email' => $request->email,
            'subject' => $request->subject,
            'emailmessage'=>$request->emailmessage,
            
          ];
          
          Mail::send('emailtemplates/sendmails', $data, function($message) use ($data) {
            $message->to($data['email']);
            $message->subject($data['subject']);
          });

        return back()->with('success','You have send the email successfully');
        
    }
}