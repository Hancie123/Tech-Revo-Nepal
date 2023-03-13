<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnouncementModel;
use Mail;

class AnnouncementController extends Controller
{


    public function insertdata(Request $request){
        $request->validate(
            [
                'announcementtitle'=>'required',
                'announcement'=>'required'
            ]
            );

            $data = [
                'announcement' => $request->announcement,
                'subject' => $request->announcementtitle,
            ];
            
            $recipients = [
                'hanciewanemphago@gmail.com',
                'nitesh0hamal@gmail.com',
                'azzaya2060@gmail.com',
                'kcaveshesh123@gmail.com',
            ];
            
            foreach ($recipients as $recipient) {
                Mail::send('mail', $data, function($message) use ($recipient, $data) {
                    $message->to($recipient);
                    $message->subject($data['subject']);
                });
            }
            
            

            $announce=new AnnouncementModel;
            $announce->title=$request['announcementtitle'];
            $announce->announcement=$request['announcement'];
            $announce->User_ID=$request['admin_id'];
            $announce->save();
            if($announce){
                return back()->with('announcesuccess','The announcement is done');
            }
            else{
                return back()->with('announcefail','Error Occurred');
            }
        

        
    }

    public function deletedata($id){

        $announce=AnnouncementModel::find($id);
        if(!is_null($announce)){
            $announce->delete();
            return back()->with('announcesuccess',"The announcement is deleted successfully");
        }
        else{
            return back()->with('announcefail',"Error Occurred");
        }
        
    }
    
}