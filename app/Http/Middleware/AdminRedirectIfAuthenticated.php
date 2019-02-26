<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminRedirectIfAuthenticated
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
        if (Auth::guard('admin')->check()) {
            //trở về trang home admin
            return redirect('/admin/home');
        }
        return $next($request);
    }
}
