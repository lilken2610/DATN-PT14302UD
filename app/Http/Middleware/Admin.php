<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if (Auth::user()) {
            if (Auth::user()->id_level === 1 || Auth::user()->id_level === 2 && Auth::check() === true) {
                return $next($request);
            } else {
                return redirect(route('shoes.auth.login'));
            }
        } else {
            return redirect(route('shoes.auth.login'));
        }
    }
}
