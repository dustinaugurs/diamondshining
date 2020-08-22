<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Cookie;
use Illuminate\Session\Store;
class allnotifications
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
        
        //$message = 'deepak';
       // return new response(view('includes.partials.allnotification', compact('message')));
       

        return $next($request);
    }
}
