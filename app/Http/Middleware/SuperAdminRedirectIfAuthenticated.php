<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperAdminRedirectIfAuthenticated
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
            $user = Auth::guard('admin')->user();
            if ($user->permission == 0) {
                return redirect('/hello');
            }
        }
        return $next($request);
    }
}
