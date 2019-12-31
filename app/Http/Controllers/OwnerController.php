<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OwnerController extends Controller
{
    //
    public function index()
    {
        $docs = DB::table('county_document')->select('county_name','document_type','document_name')->get();
        return view('document')->with('docs',$docs);
        
        return view('owner');
    }
    public function showDetails()
    {
        return view ('ownerdetails');
    }
}
