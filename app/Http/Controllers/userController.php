<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Mail;
use DB;
use Carbon\Carbon;
use Str;

class userController extends Controller
{
   public function __construct()
    {
      
      /*  $this->middleware('check_package_status', ['except' => [
            'dologin','profile','updatePackageStatus'
        ]]);*/
      // dologin
    }

  public function profile(Request $req)
  {
   if(isset($req->page)) 
   {
    $offset=5*($req->page-1);
   }   
   else
   {
    $offset=0;
   }
    $users = DB::table('users')
            ->join('administartion_users', 'users.id', '=', 'administartion_users.user_code')
            ->where('administartion_users.user_code',auth()->user()->id)
            ->select('users.*','administartion_users.*')
            ->offset($offset)->limit(5)
            ->get();
            
    return view('profile',compact('users'));
  }
  public static function getNameById($id)
  {
    $user=DB::table('users')->where('id',$id)->first();
    return $user->username;
  }
 public function updatePackageStatus(Request $req)
{
  DB::table('administartion_users')->where('user_code',auth()->user()->id)->where('id',$req->package_id)->update(['package_status'=>$req->P_Status]);
  return redirect()->back()->withSuccess('Operation held successfully');
}
  public function dologin(Request $req)
  {
    $this->checkPackageStatus($req);
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
     
  	  $credentials_with_email_verification = [
        'username' => $req['username'],
        'password' => $req['password'],
        'email_verified'=>1,
      ];
    $this->checkPackageStatus($req);
      if(Auth::attempt($credentials)) {
        //password verified
        //know check email is verified or not
        if(Auth::attempt($credentials_with_email_verification))
        {
          $user=DB::table('users')->where('username',$req['username'])->first();
          
          Auth::loginUsingId($user->id);
          
          return redirect()->to('/task');
          // dd('credentials ok and email verification ok');
        }
        else
        {
          return redirect()->back()->withError('Email not verifed');
        }
      }
      else
      {
   	    return redirect()->back()->withError('Username or password does not match');
      }
  }
  public function checkPackageStatus($req)
  {
    
  
  }
  public function logout(Request $request) {
    Auth::logout();
    return redirect('/login');
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
      $unique_token=Str::random(32);//str_random(32);  
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
  public function create(Request $req)
  {
//    dd($req);
    if(DB::table('company')->where('company_name',$req->company_name)->count() >=3)
    {
     return redirect()->back()->withError('Three users of this company are already registered');
    }
    //die();

    $validator=Validator::make($req->all(),[
        'username' => 'required|string|unique:users',
         'email' => 'required|unique:users',
         'first_name' => 'required|string',
         'last_name' => 'required|string',
         'phone' =>'required',
         'address'=> 'required|string',
         'city'=> 'required|string',
         'state' => 'required|string',
         'zip' => 'required|integer',
         'company_name' => 'required|string',
         'company_address' => 'required|string',
         'company_city' =>'required|string' ,
         'company_state' =>'required|string',
         'company_zip' => 'required|string',
         'password' => 'required|string|same:confirm_password',
         'confirm_password' =>'required|string',  
    ]);
    if ($validator->fails()) {
      return redirect()->back()
                ->withError($validator->errors()->first())
                ->withInput();
    }
    else
    {
      $unique_token=Str::random(32);
     $company_id=DB::table('company')->insertGetId([
        'company_name' => $req->company_name,
        'city' =>$req->company_city,
        'zip_code'=>$req->company_zip,
        'state'=>$req->state,
         'time_stamp_for_record_creation'=>\Carbon\Carbon::now(),
      ]);   
          DB::table('users')->insert([
            'username' => $req->input('username'),
            'first_name' => $req->first_name,
            'company_code'=>$company_id,
            'last_name' => $req->last_name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone_number'=>$req->phone,
            'address'=>$req->address,
            'city'=>$req->city,
            'zip_code'=>$req->zip,
            'email_verification_token'=>$unique_token,
            'role'=>'manager',
        ]);
        Mail::send([], [], function ($message) use($req,$unique_token) {
          $message->to($req->email)
          ->subject('Registration')
          ->setBody('<h1>Regsitraion Process</h1><br>
          <p>Click on the link to complete registration process <a href="http://localhost:8000/ActiveUser?token='.$unique_token.'">Click Here</a></p> ', 'text/html'); // for HTML rich messages
        });
      if(count(Mail::failures())==0)
      {
          return redirect()->back()->withSuccess('Email Sent Successfully verify your email');
      }       
        //send email and store data in database   
    }
  }

  public function ActiveUser(Request $req)
  {
      if(DB::table('users')->where('email_verification_token',$req->token)->update(['email_verified'=>1]))
      {
        return redirect()->to('/login')->withSuccess('Account Activated  Successfully');

      }
      return redirect()->to('/login')->withError('Something went wrong');
  }

  public function getTrailStatus()
  {
      $creation_time=DB::table('users')->where('id',auth()->user()->id)->first();
      $created = new Carbon($creation_time->time_stamp_for_record_creation);
      $now = Carbon::now();
      $difference = $created->diff($now)->days;
      //dd($difference);
      if($difference > 8 and $difference < 10)
      {
        echo json_encode($difference);
        // echo json_encode(0);
      }
      else
      {
        echo json_encode(0);
        //echo json_encode($difference);
      }
  }     
}
