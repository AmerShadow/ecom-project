<?php

namespace App\Http\Middleware;

use App\UserSubscription;
use Closure;
use Illuminate\Support\Facades\Auth;

class subscription
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
        if (Auth::user()->type==2) {
            $count=UserSubscription::where('user_id',Auth::user()->id)->where('is_expired',0)->count();
            if($count>=1){
                return $next($request);
                }
            return redirect()->back()->with('fail','Please buy any subscription plan');

        }
        return $next($request);
    }
}
