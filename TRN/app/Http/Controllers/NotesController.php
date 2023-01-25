<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NotesController extends Controller
{
    public function Notes(){
        return view('/home/notes');
    }

    public function ViewNotes(){
        $notes=notes::all();
        $data=compact('notes');
        return view('/home/view_notes')->with($data);
    }

    

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