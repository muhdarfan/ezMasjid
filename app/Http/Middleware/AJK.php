<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AJK
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
        if (!Auth::check())
            return redirect()->route('login');

        if (Auth::user()->role == 1)
            return redirect()->route('user.dashboard');

        if (Auth::user()->role == 3)
            return redirect()->route('admin.dashboard');

        if (Auth::user()->role == 2)
            return $next($request);
    }
}
