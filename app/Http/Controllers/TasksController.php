<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;

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
   public function createTask(Request $req)
   {
    
      $validator=Validator::make($req->all(),[
            'taskname' => 'required|string',
            'createdby' => 'required',
            'createdon' => 'required',
            'duedate' => 'required',
            
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        }
        else
        {
            $assigned_id=\DB::table('users')->where('username',$req->assignedto)->first();
            \DB::table('tasks')->insert([
            'user_code' =>$assigned_id->id,
            'task_creator' =>auth()->user()->id ,
            'task_name'=> $req->taskname,
            'task_notes'=>$req->tasksnotes,
            'due_date'=>$req->duedate,
            'time_stamp_for_record_creation'=>$req->createdon,
            'task_status'=>$req->status,
            'esculate_task'=>$req->esculate_task,
            'esculate_stask'=>$req->esculate_stask,
            ]);
            return redirect()->back()->withSuccess('Task Created Successfully');
            
        }
    
   }
public function getTaskData(Request $req)
{
   $update_data=\DB::table('tasks')->where('task_code',$req->id)->where('task_creator',auth()->user()->id)->get();
    echo json_encode($update_data);
}   
public function deleteTask(Request $req)
{
    if(\DB::table('tasks')->where('task_code',$req->id)->where('task_creator',auth()->user()->id)->delete())
    {
        return redirect()->back()->withSuccess('Task deleted Successfully');
    
    }
    else
    {
      return redirect()->back()->withError('Something went wrong');
    }
} 
public function getAssigneeName(Request $req)
{
    $name=\DB::table('users')->select('username')->where('id',$req->id)->first();
        echo json_encode($name->username);
}
public function updateTask(Request $req)
{
    $dueDate = $req->duedateUpdate;
  $arr = explode('-', $dueDate);
  $newDueDate = $arr[1].'/'.$arr[2].'/'.$arr[0];
  $createdon=$req->createdonUpdate;
  $arr = explode('-', $createdon);
  $newCreateDate =$arr[1].'/'.$arr[2].'/'.$arr[0];

  $assigned_id=\DB::table('users')->where('username',$req->assignedtoUpdate)->first();
            \DB::table('tasks')->where('task_code',$req->task_id)->update([
            'user_code' =>$assigned_id->id,
            'task_creator' =>auth()->user()->id ,
            'task_name'=> $req->tasknameUpdate,
            'task_discription'=>$req->asksnotesUpdate,
            'due_date'=>$newDueDate,
            'task_status'=>$req->statusUpdate,
            'esculate_task'=>$req->esculate_taskUpdate,
            'esculate_stask'=>$req->esculate_staskUpdate,
            'task_notes'=>$req->tasksnotesUpdate,
            'time_stamp_for_record_creation'=>$newCreateDate,
            ]);
            return redirect()->back()->withSuccess('Task Updated Successfully');

}

}
