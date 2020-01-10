<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class DocumentController extends Controller
{
    //
    public function index()
    {
         if(isset($req->page)) 
        {
            $offset=5*($req->page-1);
        }   
        else
        {
            $offset=0;
        }
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
                    ->get();

            $docs2 = \DB::table('county_document')
                    ->select('county_document.county_code','county_document.document_type','county_document.document_name','county_document.document_link','county_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'county_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_document.document_type','LIKE' ,"%{$req->doctype}%")
                    //->union($docs1)
                    ->get();

            $docs3 = \DB::table('state_document')
                    ->select(DB::raw('"" as county_code'),'state_document.document_type','state_document.document_name','state_document.document_link','state_document.user_code' , DB::raw('"" as county_name'))
                    ->join('county_in_us' , 'state_document.state_code', '=', 'county_in_us.state_code')
                    ->where('state_document.document_type','LIKE' ,"%{$req->doctype}%")
                    ->distinct()->get(['document_number']);

            $docs = $docs1->merge($docs2)->merge($docs3);
            
        }
        else if($req->county != ""){
            $docs1 = \DB::table('owner_document')
                    ->select('owner_document.county_code','owner_document.document_type','owner_document.document_name','owner_document.document_link','owner_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'owner_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.county_name', 'LIKE' , "%{$req->county}%")
                    ->get();

            $docs2 = \DB::table('county_document')
                    ->select('county_document.county_code','county_document.document_type','county_document.document_name','county_document.document_link','county_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'county_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.county_name','LIKE' ,"%{$req->county}%")
                    //->union($docs1)
                    ->get();

            $docs3 = \DB::table('state_document')
                    ->select(DB::raw('"" as county_code'),'state_document.document_type','state_document.document_name','state_document.document_link','state_document.user_code' , DB::raw('"" as county_name'))
                    ->join('county_in_us' , 'state_document.state_code', '=', 'county_in_us.state_code')
                    ->where('county_in_us.county_name','LIKE' ,"%{$req->county}%")
                    ->distinct()->get(['document_number']);
            $docs = $docs1->merge($docs2)->merge($docs3);
        }
        else if($req->state != "")
        {
            
            $docs1 = \DB::table('owner_document')
                    ->select('owner_document.county_code','owner_document.document_type','owner_document.document_name','owner_document.document_link','owner_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'owner_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.state_name', 'LIKE' , "%{$req->state}%")
                    ->get();

            $docs2 = \DB::table('county_document')
                    ->select('county_document.county_code','county_document.document_type','county_document.document_name','county_document.document_link','county_document.user_code' , 'county_in_us.county_name')
                    ->join('county_in_us' , 'county_document.county_code', '=', 'county_in_us.county_code')
                    ->where('county_in_us.state_name','LIKE' ,"%{$req->state}%")
                    //->union($docs1)
                    ->get();

            $docs3 = \DB::table('state_document')
                    ->select(DB::raw('"" as county_code'),'state_document.document_type','state_document.document_name','state_document.document_link','state_document.user_code' , DB::raw('"" as county_name'))
                    ->join('county_in_us' , 'state_document.state_code', '=', 'county_in_us.state_code')
                    ->where('county_in_us.state_name','LIKE' ,"%{$req->state}%")
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