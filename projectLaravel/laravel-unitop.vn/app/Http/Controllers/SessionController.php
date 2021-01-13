<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //============== Phần 17 ====================
    public function add(Request $request){
        //Lưu vào sesion, thông qua request
//        $request->session()->put('username', 'Phan Trung');

        //Lưu thông qua helper
        session(['username' => 'Phan hiếu']);

    }

    public function show(Request $request){
        //Lấy ra tất cả dữ liệu trong sesion
//        return $request->session()->all();
        //Lấy ra 1 phần tử trong session
//        return $request->session()->get('username');
        //Kiểm tra sự tồn tại của session
//        if($request->session()->has("username")){
//            echo "Đã lưu vào session";
//        }
        //Hiển thị flash session
//        return $request->session()->get('status');

        //Hiển thi thông qua helper
        return session('username');


    }

    public function add_flash(Request $request){
        //Flash session: lưu trữ tạm thơi, sau 1 phiên làm việc, reload lại trình duyệt sẽ mất
        $request->session()->flash('status','Ban da them san pham thanh cong');
    }

    public function delete(Request $request){
        //Xóa 1 phần tử trong session
        $request->session()->forget("username");
        //Xóa tất cả session
        $request->session()->flush();

    }
}
