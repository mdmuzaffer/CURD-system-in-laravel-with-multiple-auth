<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class FrontAdmin
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

        if (empty(Session::has('FrontAdmin'))){
            return back()->with('error','You are not authorise!');
        }
        return $next($request);
    }
}
