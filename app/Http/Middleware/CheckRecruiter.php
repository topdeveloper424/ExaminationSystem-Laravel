<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckRecruiter
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
        $role = Session::get('role');
        if(intval($role) != 1){
            return redirect('/login');
        }

        return $next($request);
    }
}
