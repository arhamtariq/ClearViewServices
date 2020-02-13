<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Validator;
use DB;

class ProfileController extends Controller
{
    //
    public function index(Request $req)
    {
       // dd('reach');
        $userinfo = DB::table('users')->select('users.*' , 'company.company_name' , 'company.address as ca' , 'company.city as cc' , 'company.state as cs', 'company.zip_code as cz')
                    ->join('company' , 'users.company_code', '=', 'company.company_code')
                    ->where('id' , auth()->user()->id)
                    ->get();
        
        $users = DB::table('users')->select('users.*','administration_users.*')
                ->join('administration_users', 'users.id', '=', 'administration_users.user_code')
                ->where('administration_users.user_code',auth()->user()->id)
            
            //->offset($offset)->limit(5)
            ->get();        
        return view('profile',compact('users'))->with('userinfo',$userinfo);                
        
        /*    return view('profile')->with('userinfo',$userinfo);*/
    }

    public function updateuserdetails(Request $req)
    {
        \DB::table('users')->where('id' , auth()->user()->id)->update([
            'username' => $req->username,
            'first_name' => $req->fname,
            'last_name' => $req->lname,
            'email' => $req->email,
            'phone_number'=>$req->phone,
            'address'=>$req->address,
            'city'=>$req->city,
            'state'=>$req->state,
            'zip_code'=>$req->zip,
            'company_code'=>auth()->user()->company_code,
        ]);

        \DB::table('company')->where('company_code',auth()->user()->company_code)->update([
            'company_name' =>$req->company_name,
            'address' =>$req->caddress,
            'city'=> $req->ccity,
            'state'=>$req->cstate,
            'zip_code'=>$req->czip
        ]);
        
        return redirect()->back()->withSuccess('Your profile has been updated Successfully')->withInput();        
    }

    public function changePassword(Request $req)
    {
        if ($req->newpassword == $req->cpassword)
        {
            $op = bcrypt($req->password);
            
            $id=\DB::table('users')->select('*')
                    ->where('id',auth()->user()->id)
                    ->where('password' , $op)
                    ->get();

            if ($id != null)
            {
                $np = bcrypt($req->newpassword);
                \DB::table('users')->where('id' , auth()->user()->id)->update([
                    'password' => $np
                ]);
                return redirect()->back()->withSuccess('Your password has been changed Successfully');
            }
            else
            {
                return redirect()->back()->withError('Old password is not correct.');
            }
        }
        else
        {
            return redirect()->back()->withError('New password must match confirm password.');
        }
    }
}
