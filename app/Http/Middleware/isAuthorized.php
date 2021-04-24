<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAuthorized
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_profile == 'commerce' || Auth::user()->user_profile == 'administrator'
            || Auth::user()->user_profile == 'cashier') {
            return $next($request);
        }
        return redirect('/');
    }
}
