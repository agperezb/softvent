<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_profile == 'commerce' || Auth::user()->user_profile == 'administrator'
            || Auth::user()->user_profile == 'sub_administrator') {
            return $next($request);
        }
        return redirect('/');
    }
}
