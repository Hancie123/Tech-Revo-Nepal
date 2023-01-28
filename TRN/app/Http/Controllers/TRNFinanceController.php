<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TRNFinance;
use App\Models\Contacts;
use App\Models\Room_Expenses;
use DB;

class TRNFinanceController extends Controller
{
    public function trnfinance(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $room=room_expenses::orderBy('Expenses_ID','desc')->take(6)->get();
        $deposit=room_expenses::sum('Deposit');
        $withdraw=room_expenses::sum('Withdraw');
        $balance=$deposit-$withdraw;
        $deposittable=trnfinance::select("*")->where('Status','=','Deposit')->orderByDesc("TRN_ID")->get();
        $withdrawtable=room_expenses::select("*")->where('Status','=','Withdraw')->orderBy('Expenses_ID','asc')->get();
        
        $result=DB::select(DB::raw("SELECT sum(Deposit) as ID,Remark from room_expenses where status='Deposit' group by remark"));
        $data720="";
        foreach($result as $val){
            $data720.="['".$val->Remark."',    ".$val->ID." ],";
        }
        
        $chartdata=$data720;
        
        
        return view('home/trn_finance_system',compact('contact','deposittable',
        'withdrawtable','room','deposit','viewcontact','balance','withdraw','chartdata'));
    }

    public function trndepositmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $deposittable=trnfinance::select("*")->where('Status','=','Deposit')->orderByDesc("TRN_ID")->get();

        return view('home/trn_deposit_money',compact('contact','viewcontact','deposittable'));
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
}