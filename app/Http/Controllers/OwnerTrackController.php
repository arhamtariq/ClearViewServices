<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use DateTime;

class OwnerTrackController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
      $this->middleware('check_package_status');
    }

    public function deleteOwnerTrack(Request $req)
    {
        if(\DB::table('overage_request_tracking')->where('tracking_record_number',$req->id)->delete()) //->where('task_creator',auth()->user()->id)->delete())
        {
            return redirect()->back()->withSuccess('Overage Request Tracking Notes deleted Successfully.');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong.');
        }
    }
    public function getOwnerTrackData(Request $req)
    {
        $owner_track = \DB::table('overage_request_tracking')->select('*')
                ->where('tracking_record_number',$req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();
        echo json_encode($owner_track);
    }
    public function createOwnerTrack(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'documentsent' => 'required'
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
            
            if ($req->trackingrecordnumber > 0)
            {
                \DB::table('overage_request_tracking')->where('tracking_record_number',$req->trackingrecordnumber)->update([
                    'county_document_sent' =>$req->documentsent,// ,
                    'county_receive_document'=> $req->documentreceived,
                    'document_accept_reject'=>$req->documentstatus,	
                    'receive_check_from_county'=>$req->checkreceived,
                    'check_cleared'=>$req->checkcleared,
                    'send_check_to_owner'=>$req->checksent,
                    'date_check_receive'=>$req->checkreceivedon,
                    'date_check_sent'=>$req->checksenton,
                    'record_close'=>$req->recordclosed,
                    
                ]);
                return redirect()->back()->withSuccess('Overage Request Tracking Updated Successfully');

            }
            else
            {
                
                \DB::table('overage_request_tracking')->insert([
                    'record_number' =>$req->recno3,
                    'county_document_sent' =>$req->documentsent,
                    'county_receive_document'=> $req->documentreceived,
                    'document_accept_reject'=>$req->documentstatus,	
                    'receive_check_from_county'=>$req->checkreceived,
                    'check_cleared'=>$req->checkcleared,
                    'send_check_to_owner'=>$req->checksent,
                    'date_check_receive'=>$req->checkreceivedon,
                    'date_check_sent'=>$req->checksenton,
                    'record_close'=>$req->recordclosed,
                    //'user_code'=>1//auth()->user()->id,	
                ]);
                return redirect()->back()->withSuccess('Overage Request Tracking Created Successfully');
            }
        }
    }
}
