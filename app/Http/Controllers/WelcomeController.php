<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;

class WelcomeController extends Controller
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
    public function index(Request $req)
    {
        if(isset($req->page)) 
        {
            $offset=5*($req->page-1);
        }   
        else
        {
            $offset=0;
        }
        if(isset($req->searchForm))
        {
        
            $tasks=DB::table('tasks')->where('task_creator',auth()->user()->id)->where('task_name',$req->input('task-name'))->where('time_stamp_for_record_creation',$req->input('created-on'))->orderBy('time_stamp_for_record_creation','desc')->offset($offset)->limit(5)->get();
        }
        else{
            $tasks=DB::table('tasks')->where('task_creator',auth()->user()->id)->orderBy('time_stamp_for_record_creation','desc')->offset($offset)
                ->limit(5)->get();
        }           
        return view('tasks',compact('tasks'));
    }

    public static function getTaskCreaterName($id)
    {
        $name=DB::table('users')->where('id',$id)->first();
        return $name->username;
    }

    public static function getTaskAssigneeName($id)
    {
        $name=DB::table('users')->where('id',$id)->first();
        return $name->username;
    }

   public function getUsersForAssigning(Request $request)
   {
        $data = \DB::table('users')->select("username as name")
                ->where('company_code',auth()->user()->company_code)
                ->where("username","LIKE","%{$request->input('query')}%")
                ->get();
        return response()->json($data);
   }

}
