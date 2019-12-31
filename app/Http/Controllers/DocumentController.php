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
        return view('document')->with('docs',null);
    }

    public function search()
    {
        $docs = DB::table('county_document')->select('county_name','document_type','document_name')->get();
        return view('document')->with('docs',$docs);
        //redirect()->back()->with('docs' , $docs);      
          //return redirect()->to('/task');
    }
}
