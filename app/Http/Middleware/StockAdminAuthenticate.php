<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StockAdminAuthenticate
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
            if ($user->permission != 2 && $user->permission != 0) {
                // trở về trang login admin
                return redirect()->route('no.permission');
            }
        }
        return $next($request);
    }
}
