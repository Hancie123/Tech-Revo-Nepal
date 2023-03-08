<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class sendmail extends Controller
{
    public function index(){
        $data=['name'=>"Hancie",'data'=>"Hello Hancie"];
        $user['to']='nitesh0hamal@gmail.com';
        Mail::send('mail',$data,function($message) use ($user){
            $message->to($user['to']);
            $message->subject('Hello');
        });
    }
}