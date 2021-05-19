<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            switch (Auth::user()->role) {
                case 1:
                    return redirect()->route('user.dashboard');

                case 2:
                    return redirect()->route('ajk.dashboard');

                case 3:
                    return redirect()->route('admin.dashboard');

                default:
                    return redirect('/login');
            }

            //return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
