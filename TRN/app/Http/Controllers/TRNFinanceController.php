<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TRNFinance;
use App\Models\Contacts;
use App\Models\Room_Expenses;
use DB;
use App\Models\ChatModel;
use App\Models\AnnouncementModel;

class TRNFinanceController extends Controller
{
    public function trnfinance(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $room=trnfinance::orderBy('TRN_ID','desc')->take(6)->get();
        $deposit=trnfinance::sum('Deposit');
        $withdraw=trnfinance::sum('Withdraw');
        $balance=$deposit-$withdraw;
        $deposittable=trnfinance::select("*")->where('Status','=','Deposit')->orderByDesc("TRN_ID")->get();
        $withdrawtable=trnfinance::select("*")->where('Status','=','Withdraw')->orderBy('TRN_ID','asc')->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $result=DB::select(DB::raw("SELECT sum(Deposit) as ID,Remark from trnfinance where status='Deposit' group by remark"));
        $data720="";
        foreach($result as $val){
            $data720.="['".$val->Remark."',    ".$val->ID." ],";
        }
        
        $chartdata=$data720;
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        
        
        return view('home/trn_finance_system',compact('contact','deposittable',
        'withdrawtable','room','deposit','viewcontact','balance','withdraw','chartdata','viewchat','announce','announceall'));
    }

    public function trndepositmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $deposittable=trnfinance::select("*")->where('Status','=','Deposit')->orderByDesc("TRN_ID")->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        return view('home/trn_deposit_money',compact('contact','viewcontact','deposittable','viewchat','announce','announceall'));
    }


    public function trnwithdrawmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $withdrawtable=trnfinance::select("*")->where('Status','=','Withdraw')->orderBy('TRN_ID','asc')->get();
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();
        return view('home/trn_withdraw_money',compact('contact','viewcontact','withdrawtable','viewchat','announce','announceall'));
    }


    public function trninsertmoney(Request $request){

        $request->validate([
            'date'=>'required',
            'income'=>'required',
            'remark'=>'required',
            'date3'=>'required',
        ]);
        

        $trndeposit=new TRNFinance;
        $trndeposit->Date=$request['date'];
        $trndeposit->Deposit=$request['income'];
        $trndeposit->Remark=$request['remark'];
        $trndeposit->Status=$request['status'];
        $trndeposit->Date3=$request['date3'];
        $trndeposit->User_ID=$request['admin_id'];
        $trndeposit->save();
        if($trndeposit){
            return back()->with('success','The amount is deposited successfully');
        }
        else{
            return back()->with('fail','Error Occurred');
        }
        
    }


    public function trninsertwithdrawmoney(Request $request){

        $request->validate([
            'date'=>'required',
            'income'=>'required',
            'remark'=>'required',
            'date3'=>'required',
        ]);
        

        $trndeposit=new TRNFinance;
        $trndeposit->Date=$request['date'];
        $trndeposit->Withdraw=$request['income'];
        $trndeposit->Remark=$request['remark'];
        $trndeposit->Status=$request['status'];
        $trndeposit->Date3=$request['date3'];
        $trndeposit->User_ID=$request['admin_id'];
        $trndeposit->save();
        if($trndeposit){
            return back()->with('success','The amount withdraw successfully');
        }
        else{
            return back()->with('fail','Error Occurred');
        }
        
    }
}