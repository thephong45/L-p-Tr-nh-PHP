<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
//        =========== Phần 23: Chạy middleware đầu tiên ====================
        if($request->age<16){
            return redirect('/');
        }
        return $next($request);
    }
}
