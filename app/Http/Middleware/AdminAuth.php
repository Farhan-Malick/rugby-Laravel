<?php

namespace App\Http\Middleware;

use Closure;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        /* var_dump(Auth::user());
        dd(auth()->check()); */
        if(auth()->check()){

            if (auth()->user()->account_type == 'admin') {
                return $next($request);
            }
        }
        return redirect(RouteServiceProvider::PUBLIC_HOME)->withErrors("You are not authenticated to access this resource.");

    }
}
