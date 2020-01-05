<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DateTime;
use DB;

class OwnerNotesController extends Controller
{
    //
    //To delete an owner record document
    public function deleteOwnerNotes(Request $req)
    {
        if(\DB::table('owner_notes')->where('notes_record_number',$req->id)->delete()) //->where('task_creator',auth()->user()->id)->delete())
        {
            return redirect()->back()->withSuccess('Owner Notes deleted Successfully.');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong.');
        }
    } 
    //To pull data of owner notes to modify it
    public function getOwnerNotesData(Request $req)
    {
        $owner_notes = \DB::table('owner_notes')->select('*')
                ->where('notes_record_number',$req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();
        echo json_encode($owner_notes);
    }   

    public function createOwnerNotes(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'ownernotes' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        }
        else
        {
            //$assigned_id=\DB::table('users')->where('username',$req->assignedto)->first();
            
            if ($req->notesrecordnumber > 0)
            {
                \DB::table('owner_notes')->where('notes_record_number',$req->notesrecordnumber)->update([
                    'note_type' =>$req->notestype,// ,
                    'note_details'=> $req->ownernotes,
                    'issue_resolved'=>$req->issueresolved,	
                ]);
                return redirect()->back()->withSuccess('Owner Notes Updated Successfully');

            }
            else
            {
                
                \DB::table('owner_notes')->insert([
                    'record_number' =>$req->recno2,
                    'note_type' =>$req->notestype,// ,
                    'note_details'=> $req->ownernotes,
                    'issue_resolved'=>$req->issueresolved,	
                    'user_code'=>1//auth()->user()->id,	
                ]);
                return redirect()->back()->withSuccess('Owner Notes Created Successfully');
            }
        }
    }
}
