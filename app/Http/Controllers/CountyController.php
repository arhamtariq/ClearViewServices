<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CountyController extends Controller
{
    //
    public function index()
    {
        return view('county');
    }
}
