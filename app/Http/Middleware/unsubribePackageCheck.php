<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class unsubribePackageCheck
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
        $data =   DB::table('users')
            ->join('administration_users', 'users.id', '=', 'administration_users.user_code')
            ->where('users.username',$request->username)
            ->where('administration_users.package_status',1)
            ->select('users.*','administration_users.*')
            ->count();
   
        //it means all packages are un-subscribed by user        
        if($data==0 and DB::table('users')->where('username',$request->username)->exists())
        {
            $data =   DB::table('users')
                ->where('username',$request->username)
                ->first();
          
            $created =  new \Carbon\Carbon($data->time_stamp_for_record_creation);
            $now = \Carbon\Carbon::now();
            $difference = $created->diff($now)->days;
            if($difference > 30)
            {
                return redirect()->back()->withError('You are not allowed to logged in');
                exit();
            }
        }
        return $next($request);
    }
}
