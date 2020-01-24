<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use DateTime;
use DB;

class OwnerController extends Controller
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
        $owner = DB::table('owner_list')->select('owner_list.*' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'owner_list.county_code', '=', 'county_in_us.county_code')
                    ->get();
        return view('owner')->with('owner',$owner);

        //return view('owner');
    }

    // For search
    public function searchOwner(Request $req)
    {
        if ($req->countyrecordsrch != '' && $req->ownername != '')
        {
            $owner = \DB::table('owner_list')->select('owner_list.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_list.county_code', '=', 'county_in_us.county_code')
                ->where('county_record_number',$req->countyrecordsrch)
                ->where("first_name" , "LIKE", "%{$req->ownername}%")
                ->get();
        }
        if ($req->countyrecordsrch != '' && $req->ownername == '')
        {
            $owner = DB::table('owner_list')->select('owner_list.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_list.county_code', '=', 'county_in_us.county_code')
                ->where('county_record_number',$req->countyrecordsrch)
                ->get();
        }
        else if($req->ownername != '' && $req->countyrecordsrch == '')
        {
            $owner = DB::table('owner_list')->select('owner_list.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_list.county_code', '=', 'county_in_us.county_code')
                ->where("first_name" , "LIKE", "%{$req->ownername}%")
                ->get();
        }
        else
        {
            $owner = DB::table('owner_list')->select('owner_list.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_list.county_code', '=', 'county_in_us.county_code')
                ->get();
        
        }
        return view('owner')->with('owner',$owner);
        
    }
    public function showDetails(Request $req)
    {
        $owner_contact = \DB::table('owner_contact_list')->select('owner_contact_list.*' ,'owner_list.record_number as rn', 'owner_list.first_name','owner_list.middle_name','owner_list.last_name')
                ->join('owner_list' , 'owner_list.record_number', '=', 'owner_contact_list.record_number' , 'right outer')
                ->where('owner_list.record_number' , $req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();

        $owner_document = \DB::table('owner_document')->select('owner_document.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_document.county_code' , '=', 'county_in_us.county_code')
                ->where('record_number' , $req->id)
                ->get();

        $owner_notes = \DB::table('owner_notes')->select('*')
                ->where('record_number' , $req->id)
                ->get();

        $owner_track = \DB::table('overage_request_tracking')->select('*')
                ->where('record_number' , $req->id)
                ->get();
        
        return view ('ownerdetails')->with('owner_contact' , $owner_contact)->with('owner_document',$owner_document)->with('owner_notes',$owner_notes)->with('owner_track' , $owner_track);
    }
    // for autocomplete of counties
    public function getCounties(Request $request)
    {
        $data = \DB::table('county_in_us')->select("county_code as id" , "county_name as name")
                ->where("county_name","LIKE","%{$request->input('query')}%")
                ->get();
        return response()->json($data);
    }

    //To delete an owner record
    public function deleteOwner(Request $req)
    {
        if(\DB::table('owner_list')->where('record_number',$req->id)->delete()) //->where('task_creator',auth()->user()->id)->delete())
        {
            return redirect()->back()->withSuccess('Owner deleted Successfully.');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong.');
        }
    } 

    //To delete an owner record contact
    public function deleteOwnerContact(Request $req)
    {
        if(\DB::table('owner_contact_list')->where('contact_record_number',$req->id)->delete()) //->where('task_creator',auth()->user()->id)->delete())
        {
            return redirect()->back()->withSuccess('Owner Contact deleted Successfully.');
        }
        else
        {
            return redirect()->back()->withError('Something went wrong.');
        }
    } 

    //To pull data of owner to modify it
    public function getOwnerData(Request $req)
    {
        $owner = \DB::table('owner_list')->select('owner_list.*' , 'county_in_us.county_name')
                ->join('county_in_us' , 'owner_list.county_code', '=', 'county_in_us.county_code')
                ->where('owner_list.record_number',$req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();
        echo json_encode($owner);
    }   

    //To pull data of owner contact to modify it
    public function getOwnerContactData(Request $req)
    {
        $owner = \DB::table('owner_contact_list')->select('*')
                ->where('contact_record_number',$req->id)
                ->get();
        //->where('user_code',auth()->user()->id)->get();
        echo json_encode($owner);
    }   

    //To add new owner
    public function createowner(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'countyrecno' => 'required',
            'countycode' => 'required',
            'firstname' => 'required',
            //'middle-name' => 'required',
            'lastname' => 'required',
            'propertyaddress' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'saledate' => 'required'
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

            if ($req->recordnumber > 0)
            {
                \DB::table('owner_list')->where('record_number',$req->recordnumber)->update([
                    'county_record_number' =>$req->countyrecno,
                    'county_code' =>$req->cc,// ,
                    'first_name'=> $req->firstname,
                    'middle_name'=>$req->middlename,
                    'last_name'=>$req->lastname,
                    'parcel_number'=>$req->parcelno,	
                    'property_address'=>$req->propertyaddress,	
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'zip_code'=>$req->zip,	
                    'sale_date'=>$req->saledate,
                    'overage_amount_collected'=>$req->overageamount,	
                    'overage_amount_owned_to_owner'=>$req->overageamountowned,	
                    'available_funds'=>$req->avlblfunds,	
                    'contacted_owner'=>$req->contactedowner,	
                    'contacted_county'=>$req->contactedcounty
                ]);
                return redirect()->back()->withSuccess('Owner Updated Successfully');

            }
            else
            {
                //$sd = $req->saledate;
                //$arr = explode('/',$sd);
                //$newsd = $arr[2] . '/' . $arr[0] . '/' . $arr[1];
                
            
                \DB::table('owner_list')->insert([
                    'county_record_number' =>$req->countyrecno,
                    'county_code' =>$req->cc,// ,
                    'first_name'=> $req->firstname,
                    'middle_name'=>$req->middlename,
                    'last_name'=>$req->lastname,
                    'parcel_number'=>$req->parcelno,	
                    'property_address'=>$req->propertyaddress,	
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'zip_code'=>$req->zip,	
                    'sale_date'=>$req->saledate,
                    'overage_amount_collected'=>$req->overageamount,	
                    'overage_amount_owned_to_owner'=>$req->overageamountowned,	
                    'available_funds'=>$req->avlblfunds,	
                    'contacted_owner'=>$req->contactedowner,	
                    'contacted_county'=>$req->contactedcounty,	
                    'user_code'=>auth()->user()->id,	
                ]);
                return redirect()->back()->withSuccess('Owner Created Successfully');
            }
        }
        
    }
    //To add new owner contact list
    public function createOwnerContact(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'contname' => 'required',
            'relation' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'addresstype' => 'required'
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
            
            if ($req->contactrecordnumber > 0)
            {
                \DB::table('owner_contact_list')->where('contact_record_number',$req->contactrecordnumber)->update([
                    'contact_name' =>$req->contname,// ,
                    'relationship'=> $req->relation,
                    'address'=>$req->address,	
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'zip_code'=>$req->zip,	
                    'address_type'=>$req->addresstype,
                    'cell_phone'=>$req->cell,	
                    'work_phone'=>$req->wphone,	
                    'home_phone'=>$req->hphone,	
                    'contact_status'=>$req->status,	
                    'contact_detail_status'=>$req->detailstatus,
                    'skip_tracing_source'=>$req->isskip
                ]);
                return redirect()->back()->withSuccess('Owner Contact Updated Successfully');

            }
            else
            {
                //$sd = $req->saledate;
                //$arr = explode('/',$sd);
                //$newsd = $arr[2] . '/' . $arr[0] . '/' . $arr[1];
                
            
                \DB::table('owner_contact_list')->insert([
                    'record_number' =>$req->recno,
                    'contact_name' =>$req->contname,// ,
                    'relationship'=> $req->relation,
                    'address'=>$req->address,	
                    'city'=>$req->city,
                    'state'=>$req->state,
                    'zip_code'=>$req->zip,	
                    'address_type'=>$req->addresstype,
                    'cell_phone'=>$req->cell,	
                    'work_phone'=>$req->wphone,	
                    'home_phone'=>$req->hphone,	
                    'contact_status'=>$req->status,	
                    'contact_detail_status'=>$req->detailstatus,
                    'skip_tracing_source'=>$req->isskip,	
                    'user_code'=>auth()->user()->id,	
                ]);
                return redirect()->back()->withSuccess('Owner Contact Created Successfully');
            }
        }
        
    }
}
