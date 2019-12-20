<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Mail;
use DB;

class userController extends Controller
{
  public function dologin(Request $req)
  {
  	$validator=Validator::make($req->all(),[
            'username' => 'required|string',
            'password' => 'required|string',   
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        }

  	$credentials = [
            'username' => $req['username'],
            'password' => $req['password'],
        ];

   if(Auth::attempt($credentials)) {
    //password verified
   // dd(Auth::user()->role);
    }
    else
   {
   	return redirect()->back()->withError('Username or password does not match');
   }
  }
  public function forgotPasswordRequest()
  {
  	return view('resetPasswordView');
  }
  public function resetPasswordRequest(Request $req)
  {
  	
  	$validator=Validator::make($req->all(),[
         'email' => 'required|email|exists:users',   
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        }
        $unique_token=str_random(32);  
      \DB::table('password_resets')->insert([
            'email' =>$req->email,
            'token' => $unique_token,
        ]);       
   	Mail::send([], [], function ($message) use($req,$unique_token) {
  		$message->to($req->email)
  		->subject('Rest Password')
  		->setBody('<h1>Reset Password Request</h1><br>
  			<p>You are receiving this email because we received a password reset request for your account</p><br>
        <p>Click on the link if you want to reset your password:<a href="http://localhost:8000/resetPasswordLink?token='.$unique_token.'">Click Here</a></p> ', 'text/html'); // for HTML rich messages
  	});
  	if(count(Mail::failures())==0)
  	{
     return redirect()->back()->withSuccess('Email sent successfully.');
  	}
  	else
  	{
     return redirect()->back()->withError('Something went wrong please try again');
  	}

  }
  public function resetPasswordLink(Request $req)
  {
	  if(\DB::table('password_resets')->where('token',$req->token)->exists())
	  {
	  	$token=$req->token;
	  	return view('newPassword',compact('token'));
	  }

  }
  public function setNewPassword(Request $req)
  {
   // dd($req);
  	$validator=Validator::make($req->all(),[
         'newPassword' => 'required|string|same:oldPassword',
         'oldPassword' =>'required|string',  
        ]);
  	if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        }
    else
    {
    
    DB::table('users')->whereIn('email', function($query) use ($req)
    {
        $query->select('email')
              ->from('password_resets')
              ->where('token',$req->token);
    })->update(['password'=>bcrypt($req->newPassword),
    ]);
    DB::table('password_resets')->where('token',$req->token)->delete();
    return redirect()->to('/')->withSuccess('Password Updated Successfully');

    }    
  	
  }
}
