<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
//      Tất cả
//        $this->middleware('CheckAge');
//       only('index', 'show'): chỉ áp dụng
//        $this->middleware('CheckAge')->only( 'index');
//        except( 'show'): Loại trừ
//        $this->middleware('CheckAge')->except( 'show');
//        Áp dụng quyền lên method
//        $this->middleware('CheckRole')->only('dashboard');

        //Có tham số và sử dụng middleware auth thì tring checkrole không can phải check dang nhap hay chưa
//        $this->middleware('auth','CheckRole:subcriber')->only('dashboard');
    }

    public function index(){
        return view('admin');
    }

    public function show(){
        return view('admin');
    }

    public function dashboard(){

//      Xem thông tin user đang đăng nhập, phương thức role định nghĩa trong model user
        $users = Auth::user();
        return $users->role->name;


    }
}
