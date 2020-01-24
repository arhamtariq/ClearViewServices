<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Auth;
class check_package_status
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\DB::table('administartion_users')->where('created_by_code',auth()->user()->id)->where('user_code',auth()->user()->id))
        {
      //user is admin and not created by anyone
      //we will check from time_creation because it represents when user package will expire
         $creation_time=\DB::table('users')->where('id',auth()->user()->id)->first();
         $created = new Carbon($creation_time->time_stamp_for_record_creation);
         $now = Carbon::now();
         $difference = $created->diff($now)->days;
         if($difference > 30)
         {
        //Auth::logout();
            return redirect()->back()->withError('Your Package is expired kindly buy new one');
            exit();
        }
    }
    else if(\DB::table('administartion_users')->where('created_by_code','<>',auth()->user()->id)->where('user_code',auth()->user()->id))
    {
        $creation_time=\DB::table('users')->where('id',auth()->user()->id)->first();
         $created = new Carbon($creation_time->time_stamp_for_record_creation);
         $now = Carbon::now();
        $difference = $created->diff($now)->days;
         if($difference > 30)
         {
        //Auth::logout();
            return redirect()->back()->withError('Your Package is expired kindly buy new one');
            exit();
        }

    }
        return $next($request);
    //}
}
    //}
}
