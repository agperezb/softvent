<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isCommerce
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_profile == 'commerce') {
            return $next($request);
        }
        return redirect(403);
    }
}
