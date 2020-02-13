<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class DocumentController extends Controller
{
        //
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
                
                return view('document')->with('docs',null);
        }

    public function searchDocument(Request $req)
    {
        
        $docs = null;
        if ($req->doctype != "0")
        {
            $docs1 = \DB::table('owner_document')
                    ->select('owner_document.county_code','owner_document.document_type','owner_document.document_name','owner_document.document_link','owner_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'owner_document.county_code', '=', 'county_in_us.county_code')
                    ->where('owner_document.document_type','LIKE' ,"%{$req->doctype}%")
                    ->where('user_code' , auth()->user()->id)
                    ->get();

            $docs2 = \DB::table('county_document')
                    ->select('county_document.county_code','county_document.document_type','county_document.document_name','county_document.document_link','county_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'county_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_document.document_type','LIKE' ,"%{$req->doctype}%")
                    ->where('user_code' , auth()->user()->id)
                    //->union($docs1)
                    ->get();

            $docs3 = \DB::table('state_document')
                    ->select(DB::raw('"" as county_code'),'state_document.document_type','state_document.document_name','state_document.document_link','state_document.user_code' , DB::raw('"" as county_name'))
                    ->join('county_in_us' , 'state_document.state_code', '=', 'county_in_us.state_code')
                    ->where('state_document.document_type','LIKE' ,"%{$req->doctype}%")
                    ->where('user_code' , auth()->user()->id)
                    ->distinct()->get(['document_number']);

            $docs = $docs1->merge($docs2)->merge($docs3);
            
        }
        else if($req->county != ""){
            $docs1 = \DB::table('owner_document')
                    ->select('owner_document.county_code','owner_document.document_type','owner_document.document_name','owner_document.document_link','owner_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'owner_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.county_name', 'LIKE' , "%{$req->county}%")
                    ->where('user_code' , auth()->user()->id)
                    ->get();

            $docs2 = \DB::table('county_document')
                    ->select('county_document.county_code','county_document.document_type','county_document.document_name','county_document.document_link','county_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'county_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.county_name','LIKE' ,"%{$req->county}%")
                    ->where('user_code' , auth()->user()->id)
                    //->union($docs1)
                    ->get();

            $docs3 = \DB::table('state_document')
                    ->select(DB::raw('"" as county_code'),'state_document.document_type','state_document.document_name','state_document.document_link','state_document.user_code' , DB::raw('"" as county_name'))
                    ->join('county_in_us' , 'state_document.state_code', '=', 'county_in_us.state_code')
                    ->where('county_in_us.county_name','LIKE' ,"%{$req->county}%")
                    ->where('user_code' , auth()->user()->id)
                    ->distinct()->get(['document_number']);
            $docs = $docs1->merge($docs2)->merge($docs3);
        }
        else if($req->state != "")
        {
            
            $docs1 = \DB::table('owner_document')
                    ->select('owner_document.county_code','owner_document.document_type','owner_document.document_name','owner_document.document_link','owner_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'owner_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.state_name', 'LIKE' , "%{$req->state}%")
                    ->where('user_code' , auth()->user()->id)
                    ->get();

            $docs2 = \DB::table('county_document')
                    ->select('county_document.county_code','county_document.document_type','county_document.document_name','county_document.document_link','county_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'county_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.state_name','LIKE' ,"%{$req->state}%")
                    ->where('user_code' , auth()->user()->id)
                    //->union($docs1)
                    ->get();

            $docs3 = \DB::table('state_document')
                    ->select(DB::raw('"" as county_code'),'state_document.document_type','state_document.document_name','state_document.document_link','state_document.user_code' , DB::raw('"" as county_name'))
                    ->join('county_in_us' , 'state_document.state_code', '=', 'county_in_us.state_code')
                    ->where('county_in_us.state_name','LIKE' ,"%{$req->state}%")
                    ->where('user_code' , auth()->user()->id)
                    ->distinct()->get(['document_number']);
                    //->get();
            $docs = $docs1->merge($docs2)->merge($docs3);
        }
        //$docs = DB::table('county_document')->select('county_name','document_type','document_name')->get();
        if ($docs == null)
                return back()->with("status", "Enter search term or select document type!");
        else
                return view('document')->with('docs',$docs);
        
    }
}