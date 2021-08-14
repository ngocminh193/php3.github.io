<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    private $cus;
    public function __construct()
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'cus')
    {
        if (Auth::guard('$guard')->check()){
            return $next($request);
        }
        return redirect()->route('homepage.home')->with('error','Bạn cần phải đăng nhập');
    }
}
