<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;
class Admin 
{  

   public function __construct(){

   }

   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {     

       if (!Auth::guard('admin')->user()) {
            return redirect()->route('admin_login');
        }
       
       return $next($request);
    }
}
