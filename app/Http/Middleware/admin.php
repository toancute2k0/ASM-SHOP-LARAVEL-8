<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isRole() == 0){
            return $next($request);
        }
        return redirect('login')->with('error', 'Bạn không phải là Admin');
    }
}
