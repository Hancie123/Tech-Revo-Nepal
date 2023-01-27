<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\Room_Expenses;

class RoomExpensesController extends Controller
{
    public function roomexpenses(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $deposit=room_expenses::sum('Deposit');
        $withdraw=room_expenses::sum('Withdraw');
        $balance=$deposit-$withdraw;
        return view('home/room_expenses',compact('contact','deposit','viewcontact','balance','withdraw'));
    }


    public function roomdepositmoney(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();

        return view('home/room_deposit_money',compact('contact','viewcontact'));
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
}