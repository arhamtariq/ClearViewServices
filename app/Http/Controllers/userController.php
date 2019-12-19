<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Mail;

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
        if (!$validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()
            ->withError($validator->errors()->first())
            ->withInput();
        } 
      $unique_token=str_random(32);   
   	Mail::send([], [], function ($message) use($req,$unique_token) {
  		$message->to($req->email)
  		->subject('Rest Password')
  		->setBody('<h1>Reset Password Request</h1><br>
  			<p>You are receiving this email because we received a password reset request for your account</p><br>
        <p>Click on the link if you want to reset your password:<a href="http://localhost:8000/resetPasswordRequest?token='.$unique_token.'">Click Here</a></p> ', 'text/html'); // for HTML rich messages
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
}
