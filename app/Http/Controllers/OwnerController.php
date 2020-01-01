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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $owner = DB::table('owner_list')->select('*')->get();
        return view('owner')->with('owner',$owner);

        //return view('owner');
    }

    // For search
    public function searchOwner(Request $req)
    {
        if ($req->countyrecordsrch != '' && $req->ownername != '')
        {
            

            $owner = \DB::table('owner_list')->select('*')
                ->where('county_record_number',$req->countyrecordsrch)
                ->where('first_name' , 'LIKE ', '%{$req->ownername}%')
                ->get();
            return view('owner')->with('owner',$owner);
        }
        if ($req->countyrecordsrch != '' && $req->ownername == '')
        {
            $owner = DB::table('owner_list')->select('*')->where('county_record_number',$req->countyrecordsrch)->get();
            return view('owner')->with('owner',$owner);
        }
        else if($req->ownername != '' && $req->countyrecordsrch == '')
        {
            $owner = DB::table('owner-list')->select('*')
                ->where('first_name' , 'LIKE ', '%{$req->ownername}%')
                ->get();
            return view('owner')->with('owner',$owner);
        }
        
    }
    public function showDetails()
    {
        return view ('ownerdetails');
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

    //To pull data of owner to modify it
    public function getOwnerData(Request $req)
    {
        $owner=\DB::table('owner_list')->where('record_number',$req->id)->get();//->where('user_code',auth()->user()->id)->get();
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
                    'county_code' =>$req->countycode,// ,
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
                    'county_code' =>$req->countycode,// ,
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
                    'user_code'=>1//auth()->user()->id,	
                ]);
                return redirect()->back()->withSuccess('Owner Created Successfully');
            }
        }
        
    }
}
