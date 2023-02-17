<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Room_Expenses;
use DB;
use App\Models\ChatModel;


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
        
        
        return view('home/room_expenses',compact('contact','deposittable',
        'withdrawtable','room','deposit','viewcontact','balance','withdraw','chartdata','viewchat'));
    }


    public function roomdepositmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $deposittable=room_expenses::select("*")->where('Status','=','Deposit')->orderByDesc("Expenses_ID")->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        return view('home/room_deposit_money',compact('contact','viewcontact','deposittable','viewchat'));
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
        return view('home/room_withdraw_money',compact('contact','viewcontact','withdrawtable','viewchat'));
        
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
}