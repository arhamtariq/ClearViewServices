<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Validator;

class CountyController extends Controller
{
    //
    public function index()
    {
        return view('county')->with('county',null);
    }

    public function searchCounty(Request $req)
    {
        $county = null;
        if($req->state != "" AND $req->county == "")
        {
            //$county = \DB::table('county_in_us')->select('county_in_us.*' , DB::raw('count(county_notes.county_code) as notes'))
            //        ->join('county_notes' , 'county_in_us.county_code', '=', 'county_notes.county_code','left outer')
            //        ->where("county_in_us.state_name", "LIKE" , "%{$req->state}%")
            //        ->groupby('county_in_us.county_code','county_in_us.county_name','county_in_us.state_code', 'county_in_us.state_name')
            //        ->get();
            $county = \DB::table('county_in_us')->select('*')
                            ->where("state_name", "LIKE" , "%{$req->state}%")
                            ->get();
        }
        elseif ($req->state == "" AND $req->county != "")
        {
            $county = \DB::table('county_in_us')->select('*')
                            ->where("county_name", "LIKE" , "%{$req->county}%")
                            ->get();
        }
        elseif ($req->state != "" AND $req->county != "")
        {
            $county = \DB::table('county_in_us')->select('*')
                            ->where("state_name", "LIKE" , "%{$req->state}%")
                            ->where("county_name", "LIKE" , "%{$req->county}%")
                            ->get();
        }


        //$docs = DB::table('county_document')->select('county_name','document_type','document_name')->get();
        return view('county')->with('county',$county);
    }

    public function getCountyDetails(Request $req)
    {
        $county_contact = \DB::table('county_contact')->select('county_contact.*','county_in_us.county_name','county_in_us.county_code')
                            ->join('county_in_us', 'county_contact.county_code', '=', 'county_in_us.county_code' , 'right outer')                    
                            ->where('county_in_us.county_code',$req->id)
                            ->get();

        $county_notes = \DB::table('county_notes')->select('county_notes.*','county_in_us.county_name','county_in_us.county_code')
                        ->join('county_in_us', 'county_notes.county_code', '=', 'county_in_us.county_code' , 'right outer')                    
                        ->where('county_in_us.county_code',$req->id)
                        ->get();

        $county_document = \DB::table('county_document')->select('county_document.*','county_in_us.county_name','county_in_us.county_code')
                            ->join('county_in_us', 'county_document.county_code', '=', 'county_in_us.county_code' , 'right outer')                    
                            ->where('county_in_us.county_code',$req->id)
                            ->get();
        return view('countydetails')->with('county_contact' , $county_contact)->with('county_notes' , $county_notes)->with('county_document' , $county_document);
    }

    //To add county document
    public function createCountyDoc(Request $req)
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
                \DB::table('county_document')->where('document_number',$req->docid)->update([
                    'document_type' => $req->doctype,
                    'document_name' => $req->docname,
                    'document_link' => $path,
                ]);
                return redirect()->back()->withSuccess('County Document Updated Successfully');
            }
            else
            {
                \DB::table('county_document')->insert([
                    'county_code' =>$req->doccc,
                    'document_type' => $req->doctype,
                    'document_name' => $req->docname,
                    'document_link' => $path,
                    'user_code' => 1
                ]);
                return redirect()->back()->withSuccess('County Document Saved Successfully');
            }
        }
    }
    //To add new county contact list
    public function createCountyContact(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'contname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone1'=>'max:10',
            'ext1'=>'max:10',
            'phone2'=>'max:10',
            'ext2'=>'max:10',
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
            if ($req->contactid > 0)
            {
                \DB::table('county_contact')->where('contact_record_id',$req->contactid)->update([
                    'contact_name' =>$req->contname,// ,
                    'email'=> $req->email,
                    'address'=>$req->address,	
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'zip_code'=>$req->zip,	
                    'phone_1'=>$req->phone1,
                    'phone_extention_1'=>$req->ext1,	
                    'phone_2'=>$req->phone2,	
                    'phone_extention_2'=>$req->ext2,	
                ]);
                return redirect()->back()->withSuccess('County Contact Updated Successfully');

            }
            else
            {
                \DB::table('county_contact')->insert([
                    'county_code' =>$req->contactcc,
                    'contact_name' =>$req->contname,// ,
                    'email'=> $req->email,
                    'address'=>$req->address,	
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'zip_code'=>$req->zip,	
                    'phone_1'=>$req->phone1,
                    'phone_extention_1'=>$req->ext1,	
                    'phone_2'=>$req->phone2,	
                    'phone_extention_2'=>$req->ext2,	
                ]);
                return redirect()->back()->withSuccess('County Contact Created Successfully');
            }
        }
        
    }
    //To pull data of county document to modify it
    public function getCountyDocData(Request $req)
    {
        $doc = \DB::table('county_document')->select('*')
                    ->where('document_number',$req->id)
                    ->get();
                    //->where('user_code',auth()->user()->id)->get();
        echo json_encode($doc);
    }
    //To pull data of county contact to modify it
    public function getCountyContactData(Request $req)
    {
        $cont = \DB::table('county_contact')->select('*')
                ->where('contact_record_id',$req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();
        echo json_encode($cont);
    }  
    
    public function deleteCountyContact(Request $req)
    {
        if(\DB::table('county_contact')->where('contact_record_id',$req->id)->delete()) //->where('task_creator',auth()->user()->id)->delete())
        {
            return redirect()->back()->withSuccess('County Contact deleted Successfully.');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong.');
        }
    }

    public function deleteCountyNotes(Request $req)
    {
        if(\DB::table('county_notes')->where('note_number',$req->id)->delete())
            return redirect()->back()->withSuccess('County Notes deleted Successfully.');
        else
            return redirect()->back()->withError('Something went wrong.');
    }
    public function getCountyNotesData(Request $req)
    {
        $note = \DB::table('county_notes')->select('*')->where('note_number',$req->id)->get();
        echo json_encode($note);
    }
    public function deleteCountyDoc(Request $req)
    {
        if(\DB::table('county_document')->where('document_number',$req->id)->delete())
            return redirect()->back()->withSuccess('County Document deleted Successfully.');
        else
            return redirect()->back()->withError('Something went wrong.');
    }
    public function createCountyNotes(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'countynotes' => 'required',
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
                \DB::table('county_notes')->where('note_number',$req->notenumber)->update([
                    'note_type' =>$req->notestype,// ,
                    'note_details'=> $req->countynotes,	
                ]);
                return redirect()->back()->withSuccess('County Notes Updated Successfully');

            }
            else
            {
                \DB::table('county_notes')->insert([
                    'county_code' =>$req->notecc,
                    'note_type' =>$req->notestype,// ,
                    'note_details'=> $req->countynotes,
                    'user_code'=>1	
                ]);
                return redirect()->back()->withSuccess('County Notes Created Successfully');
            }
        }
    }

    public function viewfile(Request $req)
    {
        $file = public_path($req->path);

        if (!File::exists($file)) {
            abort(404);
        }

        return Response::make(file_get_contents($file), 200, array(
            'Content-Type' => File::mimeType($file),
            'Content-Disposition' => 'inline; filename="' . $req->path . '"',
        ));
        
        
    }
}
