<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contacts;
use Hash;
use Session;
use DB;
use App\Models\ChatModel;
use App\Models\Room_Expenses;
use App\Models\TRNFinance;
use App\Models\ProjectModel;
use App\Models\Notes;
use App\Models\AnnouncementModel;

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
                    $request->session()->put('Loginid',$admin->admin_id);
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

    public function dashboard(){
        $data=array();
        if(Session::has('Loginid')){
            $data=admin::where('admin_id','=',Session::get('Loginid'))->first();
            Session::put('admin_id',$data->admin_id);
            Session::put('name',$data->name);
            Session::put('email',$data->email);
            Session::put('dob',$data->dob);
            Session::put('mobileno',$data->mobileno);
            Session::put('address',$data->address);
        }
        // else{
        //     return redirect('login');
        // }
        $contact=contacts::count();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        
        $deposit=room_expenses::sum('Deposit');
        $withdraw=room_expenses::sum('Withdraw');
        $roombalance=$deposit-$withdraw;

        $trndeposit=TRNFinance::sum('Deposit');
        $trnwithdraw=TRNFinance::sum('Withdraw');
        $trnbalance=$trndeposit-$trnwithdraw;

        $project=ProjectModel::count();
        $notes=Notes::count();


        $projectdata=DB::select(DB::raw("SELECT count(project_id) as ID, category from trnprojects group by category;"));
        $projectdata720="";
        foreach($projectdata as $val){
            $projectdata720.="['".$val->category."',    ".$val->ID." ],";
        }
        
        $projectchart=$projectdata720;
        $projectbudget=ProjectModel::sum('budget');
        $allproject=DB::select(DB::raw("SELECT * FROM trnprojects ORDER BY project_id DESC limit 10;"));


        $result=DB::select(DB::raw("SELECT SUM(Withdraw) as Withdraw1, SUM(Deposit) 
        as Depo, Date3 from room_expenses group by Date3 order by Expenses_ID DESC Limit 50;"));
        $data720="";
        foreach($result as $val){
            $data720.="['".$val->Date3."',    ".$val->Withdraw1.", ".$val->Depo." ],";
        }
        
        $chartdata=$data720;
        
        return view('home/dashboard',compact('data','contact','viewcontact','viewchat','roombalance'
    ,'trnbalance','project','notes','chartdata','projectchart','projectbudget','allproject','announce','announceall'));
    }

   


    public function logout(){
        if(Session::has('Loginid')){
            Session::pull('Loginid');
            return redirect('login');
        }


    }
}