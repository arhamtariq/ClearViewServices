<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OwnerController extends Controller
{
    //
    public function index()
    {
        return view('owner');
    }
    public function showDetails()
    {
        return view ('ownerdetails');
    }
}
