<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Akses
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param null $role1
     * @return mixed
     */
    public function handle($request, Closure $next, $role1= null)
    {
        if(Auth::user()->akses == 'user' && $role1 == 'user' ) {
            return $next($request);
        }
        elseif (Auth::user()->akses == 'admin' ) {
            return $next($request);
        }
        return abort(404);
    }
}
