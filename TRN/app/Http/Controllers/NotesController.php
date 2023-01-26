<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\Contacts;

class NotesController extends Controller
{
    public function Notes(){
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        return view('/home/notes',compact('contact','viewcontact'));
    }

    public function ViewNotes(){
        $notes=notes::all();
        $contact=contacts::count();
        $viewcontact=contacts::orderBy('contact_id','desc')->take(4)->get();
        return view('/home/view_notes',compact('notes','contact','viewcontact'));
    }


    public function countNotes(){
        $notescount=notes::count();
        
        
        return view('/home/view_notes',compact('notescount','contact','viewcontact'));
    }


    // public function ViewNotes1($id){
    //     $notes=notes::find($id);
    //     if ($notes){
    //         return view('/home/view_notes');
    //     }
    //     else{
    //         $data=compact('notes');
    //     return view('/home/view_notes')->with($data);
            
    //     }
        
    // }

    

    public function storenotes(Request $request){

        $request->validate(
            [
              'title'=>'required',
              'note'=>'required',  
            ]
            );

            $note=new Notes;
            $note->title=$request['title'];
            $note->notes=$request['note'];
            $note->admin_id=$request['admin_id'];
            $note->save();
            if ($note){
                return back()->with('notesuccess','You have saved the note successfully');
                
            }
            else{
                return back()->with('notefail','Error Occurred');
            }
            
        
    }

    
}