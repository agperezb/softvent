<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdministrator
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_profile == 'administrator') {
            return $next($request);
        }
        return redirect(403);
    }
}
