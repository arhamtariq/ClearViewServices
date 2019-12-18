<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;

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
}
