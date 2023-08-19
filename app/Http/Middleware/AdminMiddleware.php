<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
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
  if(Auth::user() && Auth()->user()->user_role == 'admin')
    {
        return $next($request);
     
    }
    elseif(Auth::check() == 'user')
    {
        return redirect()->route('login');
    }
    else{
        return redirect()->route('login');
    }
}
}
