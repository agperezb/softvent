<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isActive
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->user_status == 1) {
            return $next($request);
        }
        Auth::logout();
        return redirect('/')->with('warning', 'Usuario inactivo, comuniquese con administración.');
    }
}
