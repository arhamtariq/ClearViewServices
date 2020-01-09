<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Validator;
use DB;
class AdminController extends Controller
{
    //
    public function index(Request $req)
    {
     //dump(auth()->user());
    	//die();
        if(isset($req->page)) 
        {
            $offset=5*($req->page-1);
        }   
        else
        {
            $offset=0;
        }
        //dump($offset);
        //die(); 
    	$userObj = new User();
    	//dump($userObj->getSubUsers());
    	//die();
    	$users=DB::table('users')
            ->join('administartion_users', 'administartion_users.user_code', '=', 'users.id')->where('administartion_users.created_by_code',auth()->user()->id)
            ->select('users.*')
            ->offset($offset)
            ->limit(5)
            ->get();
         //dump($users);
         //exit(); 
            
        return view('admin',compact('userObj','users'));
    }
    public function create_sub_user(Request $req)
    {
    	
     $userObj = new User();
     if($userObj->getSubUsers() == 0)
     {
     	return redirect()->back()->withError('New users cannot be added .update your plan');
     } 
    $validator=Validator::make($req->all(),[
        'username' => 'required|string|unique:users',
         'email' => 'required|unique:users',
         'fname' => 'required|string',
         'lname' => 'required|string',
         'role' => 'required|string',
         'phone' =>'required',
         'address'=> 'required|string',
         'city'=> 'required|string',
         'state' => 'required|string',
         'zip' => 'required|integer',
         'password' => 'required|string',
        ]);
     if ($validator->fails()) {
       return redirect()->back()
                ->withError($validator->errors()->first())
                ->withInput();
      }
      else
      {
      	$unique_token=1;
       $id=DB::table('users')->insertGetId([
            'username' => $req->input('username'),
            'first_name' => $req->fname,
            'last_name' => $req->lname,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone_number'=>$req->phone,
            'address'=>$req->address,
            'city'=>$req->city,
            'zip_code'=>$req->zip,
            'email_verification_token'=>$unique_token,
            'role'=>$req->role,
            'email_verified'=>1,
            'company_code'=>auth()->user()->company_code,
        ]);
    
       DB::table('administartion_users')->where('created_by_code',auth()->user()->id)->where('user_code','=',null)->limit(1)->update([
            'user_code' => $id,
        ]);
        return redirect()->back()->withSuccess('User Created Successfully');
      }
    }
   public function removeUser(Request $req)
   {
   
    DB::table('administartion_users')->where('created_by_code',auth()->user()->id)->where('user_code',$req->id)->delete();
      return redirect()->back()->withSuccess('User deleted Successfully');

   }
 public function update_sub_user(Request $req)
  {
    $unique_token=1;
       $id=DB::table('users')->update([
            'username' => $req->input('usernameU'),
            'first_name' => $req->fnameU,
            'last_name' => $req->lnameU,
            'email' => $req->emailU,
            'phone_number'=>$req->phoneU,
            'address'=>$req->addressU,
            'city'=>$req->cityU,
            'zip_code'=>$req->zipU,
            'email_verification_token'=>$unique_token,
            'role'=>$req->roleU,
            'email_verified'=>1,
            'company_code'=>auth()->user()->company_code,
        ]);
       return redirect()->back()->withSuccess('User updated Successfully');
  }
   public function adminUsers(Request $req)
   {
   /* $users=DB::table()->where()->where()->get();*/
    $users = DB::table('users')
            ->join('administartion_users', 'users.id', '=', 'administartion_users.created_by_code')->join('administartion_users as a_u', 'users.id', '=','a_u.user_code')
            ->where('administartion_users.created_by_code',auth()->user()->id)
            ->where('administartion_users.user_code',$req->id)
            ->select('users.*')
            ->get();
           
    echo json_encode($users);
   }
}
