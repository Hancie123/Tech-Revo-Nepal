<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use App\Models\ProjectModel;
use DB;
use App\Models\ChatModel;
use App\Models\AnnouncementModel;

class TRNProjectController extends Controller
{
    public function trnproject(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        $countproject=ProjectModel::count();
        $activeproject=ProjectModel::where('status','In Progress')->count();
        $completeproject=ProjectModel::where('status','Completed')->count();
        $pendingproject=ProjectModel::where('status','Pending')->count();
        $table=DB::select(DB::raw("SELECT * FROM trnprojects;"));
        $viewchat=ChatModel::orderBy('chat_id','desc')->take(500)->get();
        
        $result=DB::select(DB::raw("SELECT count(project_id) as ID, category from trnprojects group by category;"));
        $data720="";
        foreach($result as $val){
            $data720.="['".$val->category."',    ".$val->ID." ],";
        }
        
        $chartdata=$data720;
        $announce=AnnouncementModel::count();
        $announceall=AnnouncementModel::all();

        

        
        return view('home/trn_projects',compact('contact','viewcontact','table','countproject',
        'activeproject','completeproject','pendingproject','chartdata','viewchat','announce','announceall'));
    }

    public function insertdata(Request $request){
        $request->validate(
            [
              'title'=>'required' , 
              'progress'=>'required',
              'status'=>'required',
              'priority'=>'required',
              'given'=>'required',
              'category'=>'required',
              'duedate'=>'required|date',
            ]
            );

        $project=new ProjectModel;
        $project->title=$request['title'];
        $project->progress=$request['progress'];
        $project->status=$request['status'];
        $project->priority=$request['priority'];
        $project->budget=$request['budget'];
        $project->givenby=$request['given'];
        $project->category=$request['category'];
        $project->duedate=$request['duedate'];
        $project->User_ID=$request['admin_id'];
        $project->save();
        if($project){
            return back()->with('success','The project details is saved successfully');
        }
        else{
            return back()->with('fail','Error Occurred');
        }
    }


    public function deletedata($id){
        
        $project=ProjectModel::find($id);
        if(!is_null($project)){
            
            $project->delete();
            return redirect('/home/trn_projects')->with('success','The password is deleted successfully');
        }
        else{
            return redirect('/home/trn_projects')->with('fail','Error Occurred');
        }
        
    }
}