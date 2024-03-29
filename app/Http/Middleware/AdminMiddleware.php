<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        if (Auth::user()->type==1) {
             return $next($request);
        }
        if (Auth::user()->type==2) {
            return redirect()->route('seller.home');
        }
        return redirect()->back();
    }
}
