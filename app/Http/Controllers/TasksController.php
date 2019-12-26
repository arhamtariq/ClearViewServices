<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class TasksController extends Controller
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
        return view('tasks');
    }
   public function getUsersForAssigning(Request $request)
   {
     $data = \DB::table('users')->select("username as name")
                ->where("username","LIKE","%{$request->input('query')}%")
                ->get();
        return response()->json($data);
   }

}
