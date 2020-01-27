<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Validator;
use DateTime;
use DB;
use File;
use Storage;

class OwnerDocController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   public function __construct()
    {
        //$this->middleware('auth');
      $this->middleware('check_package_status');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {

    }

    //To pull data of owner to modify it
    public function getOwnerDocData(Request $req)
    {
        $owner_doc = \DB::table('owner_document')->select('owner_document.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_document.county_code', '=', 'county_in_us.county_code')
                ->where('owner_document.document_record_number',$req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();
        echo json_encode($owner_doc);
    }   

    public function createOwnerDoc(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'countycode' => 'required',
            'doctype' => 'required',
            'docname' => 'required',
            'docFile' => 'required'
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
            
            if ($req->documentrecordnumber > 0)
            {
                $file = $req->file('docFile');
                $path = $file->storeAs('uploads',$file->getClientOriginalName());
                $destinationPath = 'uploads';
                $file->move($destinationPath,$file->getClientOriginalName());

                \DB::table('owner_document')->where('document_record_number',$req->documentrecordnumber)->update([
                    'county_code' =>$req->cc,// ,
                    'document_type'=> $req->doctype,
                    'document_name'=>$req->docname,	
                    'document_link'=>$path
                ]);
                return redirect()->back()->withSuccess('Owner Document Updated Successfully');

            }
            else
            {
                $file = $req->file('docFile');
                $path = $file->storeAs('uploads',$file->getClientOriginalName());
                $destinationPath = 'uploads';
                $file->move($destinationPath,$file->getClientOriginalName());

                \DB::table('owner_document')->insert([
                    'record_number' =>$req->recno1,
                    'county_code' =>$req->cc,// ,
                    'document_type'=> $req->doctype,
                    'document_name'=>$req->docname,	
                    'document_link'=>$path,//$destinationPath . '/' . $req->docFile->getClientOriginalName() . '.' . $req->docFile->getClientOriginalExtension(),
                    'user_code'=>auth()->user()->id,	
                ]);

                return redirect()->back()->withSuccess('Owner Document Created Successfully');
            }
        }
        
    }
    //To delete an owner record document
    public function deleteOwnerDoc(Request $req)
    {
        if(\DB::table('owner_document')->where('document_record_number',$req->id)->delete()) //->where('task_creator',auth()->user()->id)->delete())
        {
            return redirect()->back()->withSuccess('Owner Document deleted Successfully.');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong.');
        }
    } 
    public function viewfile(Request $req)
    {
        //$file = public_path($req->path);
        $file = $req->path;
        if (!File::exists($file)) {
            abort(404);
        }
        return Response::make(file_get_contents($file), 200, array(
            'Content-Type' => File::mimeType($file),
            'Content-Disposition' => 'inline; filename="' . $req->path . '"',
        ));
        //if (!File::exists('../../../' . $req->path)) {
        //    abort(404);
        //}
        //return response()->file('../../../' . $req->path);
        
        //return response()->file('../storage/app/' . $req->path, [
        //    'Content-Type' => 'application/octet-stream'
       // ]);
    }
    
}
