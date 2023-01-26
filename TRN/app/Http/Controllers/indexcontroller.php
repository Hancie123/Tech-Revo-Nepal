<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Admin;

class indexcontroller extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    

    public function password(){
        return view('home/passwords');
    }

    
    

    
}