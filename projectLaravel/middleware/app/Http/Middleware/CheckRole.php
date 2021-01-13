<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        $users = Auth::user();
        //Không tham số, Auth::check(): Kiểm tra user đăng nhập hay chưa
//        if(Auth::check()){
//            if($users->role->name=='subcriber'){
//                return redirect('/');
//            }
//        }else{
//            return redirect('login');
//        }


//        Có tham số, thêm tham số $role và trên chỗ hàm ở trên
//        if($users->role->name==$role){
//            return redirect('/');
//
//        }

        if($users->role->name=='subcriber'){
            return redirect('/');
        }
        return $next($request);
    }
}
