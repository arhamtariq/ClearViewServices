<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Validator;

class StateController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
      $this->middleware('check_package_status');
    }

    public function index()
    {
         //if(isset($req->page)) 
        {
        //    $offset=5*($req->page-1);
        }   
        //else
        {
            $offset=0;
        }
        $state = \DB::table('county_in_us')
                    ->select('county_in_us.state_code','county_in_us.state_name','timeframe_before_finders_fee','where_list_is_located')
                    ->join('workable_state','county_in_us.state_code' , '=', 'workable_state.state_code','left outer')
                    ->distinct()->get(['county_in_us.state_name']);
        return view('state')->with('state',$state);

    }

    public function searchState(Request $req)
    {
        $state = null;
        if($req->state != "")
        {
            $state = \DB::table('county_in_us')->select('state_code','state_name')
                            ->where("state_name", "LIKE" , "%{$req->state}%")
                            ->distinct()->get(['state_name']);
        }
        //$docs = DB::table('county_document')->select('county_name','document_type','document_name')->get();
        return view('state')->with('state',$state);
    }
    public function getStateDetails(Request $req)
    {
        $state_notes = \DB::table('state_notes')->select('state_notes.*','county_in_us.state_name','county_in_us.state_code')
                        ->join('county_in_us', 'state_notes.state_code', '=', 'county_in_us.state_code' , 'right outer')                    
                        ->where('county_in_us.state_code',$req->id)
                        ->where('user_code' , auth()->user()->id)
                        ->distinct()->get(['note_number']);

        $state_document = \DB::table('state_document')->select('state_document.*','county_in_us.state_name','county_in_us.state_code')
                            ->join('county_in_us', 'state_document.state_code', '=', 'county_in_us.state_code' , 'right outer')                    
                            ->where('county_in_us.state_code',$req->id)
                            ->where('user_code' , auth()->user()->id)
                            ->distinct()->get(['document_number']);
        return view('statedetails')->with('state_notes' , $state_notes)->with('state_document' , $state_document);
    }
    public function getWorkableDetails(Request $req)
    {
        $workable = \DB::table('workable_state')->select('*')
                    ->where('state_code' , $req->id)
                    ->get();

        echo json_encode($workable);
    }
    //To add state document
    public function createStateDoc(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'docname' => 'required',
            'docFile' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        }
        else
        {
            $file = $req->file('docFile');
            $path = $file->storeAs('uploads',$file->getClientOriginalName());
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            if ($req->docid > 0)
            {
                \DB::table('state_document')->where('document_number',$req->docid)->update([
                    'document_type' => $req->doctype,
                    'document_name' => $req->docname,
                    'document_link' => $path,
                ]);
                return redirect()->back()->withSuccess('State Document Updated Successfully');
            }
            else
            {
                \DB::table('state_document')->insert([
                    'state_code' =>$req->docsc,
                    'document_type' => $req->doctype,
                    'document_name' => $req->docname,
                    'document_link' => $path,
                    'user_code' => auth()->user()->id,
                    'company_code' => auth()->user()->company_code
                ]);
                return redirect()->back()->withSuccess('State Document Saved Successfully');
            }
        }
    }
    
    //To pull data of state document to modify it
    public function getStateDocData(Request $req)
    {
        $doc = \DB::table('state_document')->select('*')
                    ->where('document_number',$req->id)
                    ->get();
                    //->where('user_code',auth()->user()->id)->get();
        echo json_encode($doc);
    }
    

    public function deleteStateNotes(Request $req)
    {
        if(\DB::table('state_notes')->where('note_number',$req->id)->delete())
            return redirect()->back()->withSuccess('State Notes deleted Successfully.');
        else
            return redirect()->back()->withError('Something went wrong.');
    }
    public function getStateNotesData(Request $req)
    {
        $note = \DB::table('state_notes')->select('*')->where('note_number',$req->id)->get();
        echo json_encode($note);
    }
    public function deleteStateDoc(Request $req)
    {
        if(\DB::table('state_document')->where('document_number',$req->id)->delete())
            return redirect()->back()->withSuccess('State Document deleted Successfully.');
        else
            return redirect()->back()->withError('Something went wrong.');
    }
    public function createStateNotes(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'statenotes' => 'required',
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
            if ($req->notenumber > 0)
            {
                \DB::table('state_notes')->where('note_number',$req->notenumber)->update([
                    'note_type' =>$req->notestype,// ,
                    'note_details'=> $req->statenotes,	
                ]);
                return redirect()->back()->withSuccess('State Notes Updated Successfully');

            }
            else
            {
                \DB::table('state_notes')->insert([
                    'state_code' =>$req->notesc,
                    'note_type' =>$req->notestype,// ,
                    'note_details'=> $req->statenotes,
                    'user_code' => auth()->user()->id,
                    'company_code' => auth()->user()->company_code
                ]);
                return redirect()->back()->withSuccess('State Notes Created Successfully');
            }
        }
    }
}
