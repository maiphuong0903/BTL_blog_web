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
        // if(!(Auth::user()->role) && Auth::user()->role != 1) return rou('/login');\
        if ($request->user() && $request->user()->role != 1) {
            return redirect()->route('login'); // Điều hướng người dùng về trang đăng nhập
        }

        return $next($request);
    }

}

