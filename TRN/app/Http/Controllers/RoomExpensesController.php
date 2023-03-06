<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Room_Expenses;
use DB;
use App\Models\ChatModel;
use App\Models\AnnouncementModel;


class RoomExpensesController extends Controller
{
    public function roomexpenses(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $room=room_expenses::orderBy('Expenses_ID','desc')->take(6)->get();
        $deposit=room_expenses::sum('Deposit');
        $withdraw=room_expenses::sum('Withdraw');
        $balance=$deposit-$withdraw;
        $deposittable=room_expenses::select("*")->where('Status','=','Deposit')->orderByDesc("Expenses_ID")->get();
        $withdrawtable=room_expenses::select("*")->where('Status','=','Withdraw')->orderBy('Expenses_ID','asc')->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $result=DB::select(DB::raw("SELECT sum(Deposit) as ID,Remark from room_expenses where status='Deposit' group by remark"));
        $data720="";
        foreach($result as $val){
            $data720.="['".$val->Remark."',    ".$val->ID." ],";
        }
        
        $chartdata=$data720;

        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        
        
        return view('home/room_expenses',compact('contact','deposittable',
        'withdrawtable','room','deposit','viewcontact','balance','withdraw','chartdata','viewchat','announce','announceall'));
    }


    public function roomdepositmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $deposittable=room_expenses::select("*")->where('Status','=','Deposit')->orderByDesc("Expenses_ID")->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        return view('home/room_deposit_money',compact('contact','viewcontact','deposittable','viewchat','announce','announceall'));
    }

    public function insertmoney(Request $request){

        $request->validate([
            'date'=>'required',
            'income'=>'required',
            'remark'=>'required',
            'date3'=>'required',
        ]);
        

        $roomdeposit=new Room_Expenses;
        $roomdeposit->Date=$request['date'];
        $roomdeposit->Deposit=$request['income'];
        $roomdeposit->Remark=$request['remark'];
        $roomdeposit->Status=$request['status'];
        $roomdeposit->Date3=$request['date3'];
        $roomdeposit->User_ID=$request['admin_id'];
        $roomdeposit->save();
        if($roomdeposit){
            return back()->with('success','The amount is deposited successfully');
        }
        else{
            return back()->with('fail','Error Occurred');
        }
        
    }

    public function withdrawmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $withdrawtable=room_expenses::select("*")->where('Status','=','Withdraw')->orderBy('Expenses_ID','asc')->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        return view('home/room_withdraw_money',compact('contact','viewcontact','withdrawtable','viewchat','announce','announceall'));
        
    }


    public function insertwithdrawmoney(Request $request){

        $request->validate([
            'date'=>'required',
            'income'=>'required',
            'remark'=>'required',
            'date3'=>'required',
        ]);
        

        $roomdeposit=new Room_Expenses;
        $roomdeposit->Date=$request['date'];
        $roomdeposit->Withdraw=$request['income'];
        $roomdeposit->Remark=$request['remark'];
        $roomdeposit->Status=$request['status'];
        $roomdeposit->Date3=$request['date3'];
        $roomdeposit->User_ID=$request['admin_id'];
        $roomdeposit->save();
        if($roomdeposit){
            return back()->with('success','The amount withdraw successfully');
        }
        else{
            return back()->with('fail','Error Occurred');
        }
        
    }


    public function room_report(){

        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        
        $result=DB::select(DB::raw("SELECT SUM(Withdraw) as Withdraw1, SUM(Deposit) 
        as Depo, Date3 from room_expenses group by Date3 order by Expenses_ID DESC;"));
        $data720="";
        foreach($result as $val){
            $data720.="['".$val->Date3."',    ".$val->Withdraw1.", ".$val->Depo." ],";
        }
        $chartdata=$data720;



        $dailydata1=DB::select(DB::raw("Select sum(Deposit) as Depo,Remark from room_expenses 
        Where status='Deposit' and date(created_at) = current_date group by Remark;"));
        $dailynum1="";
        foreach($dailydata1 as $val){
            $dailynum1.="['".$val->Remark."', ".$val->Depo." ],";
        }
        $dailychart1=$dailynum1;


        $dailydata2=DB::select(DB::raw("Select sum(Withdraw) as withdraw,Remark from room_expenses 
        Where status='Withdraw' and date(created_at) = current_date group by Remark;"));
        $dailynum2="";
        foreach($dailydata2 as $val){
            $dailynum2.="['".$val->Remark."', ".$val->withdraw." ],";
        }
        $dailychart2=$dailynum2;


        $sevendaysdata=DB::select(DB::raw("SELECT SUM(Withdraw) as Withdraw1, SUM(Deposit) as 
        Depo,Date3 from room_expenses Where date(created_at) >= now() - INTERVAL 7 day group by Date3 order by Expenses_ID DESC;"));
        $sevenchart720="";
        foreach($sevendaysdata as $val){
            $sevenchart720.="['".$val->Date3."',    ".$val->Withdraw1.", ".$val->Depo." ],";
        }
        $weeklychart=$sevenchart720;


        $monthlydata=DB::select(DB::raw("SELECT SUM(Withdraw) as Withdraw1, SUM(Deposit) as 
        Depo,Date3 from room_expenses Where date(created_at) >= now() - INTERVAL 30 day group by Date3 order by Expenses_ID DESC;"));
        $month720="";
        foreach($monthlydata as $val){
            $month720.="['".$val->Date3."',    ".$val->Withdraw1.", ".$val->Depo." ],";
        }
        $monthchart=$month720;


        return view('home/room_report',compact('monthchart','weeklychart','dailychart1','dailychart2','contact','viewcontact','viewchat','announce','announceall','chartdata'));
        
    }
}