<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ProfileController extends Controller
{

    public function profile(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        return view('home/profile',compact('contact','viewcontact'));
    }
    
    
}