<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckBrowser
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

        if (Auth::user()->type != 'Browser') {
            return redirect()->route('home');
        }  
        return $next($request);
    }
}
