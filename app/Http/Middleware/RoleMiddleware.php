<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$check)
    {
        $id = Auth::user()->id_level;
        if ( $id != $check ) {
            $request->session()->flash('error','Tài khoản của bạn không có chức năng này');
            return redirect()->route('shoes.admin.index');
        }
        return $next($request);
    }
}
