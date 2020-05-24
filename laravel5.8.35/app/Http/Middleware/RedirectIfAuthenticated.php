<?php

namespace App\Http\Middleware;

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
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        // @author: ledinhbinh
        if (Auth::guard($guard)->check()) {
            switch ($guard) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;

                default:
                    return redirect()->route('user.dashboard');
                    break;
            }
        }
        //


        // it must be have this or error
        return $next($request);
    }
}
