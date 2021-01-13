<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HelperController extends Controller
{
    // ================ Phần 15 =======================
    public function url(){
        //Tao url cơ bản
//        $url = url('login');

        //Tọa url qua route, post.show là tên route bên định tuyến
//        $url = route('post.show');

        //Tạo đường dẫn qua action
        $url = action('PostController@store');

        //Lấy đường dẫn truy cập hiện tại( current url)
        $url = url()->current();
        echo $url;
    }

    //================== Phần 16 ======================
    public function string(){
        //1. lấy độ dài chuỗi
        $str1 = "phan Hoang Trung  ";
//        echo Str::length($str1);
        //2. in thường in hoa chuỗi
        //In thường
//        echo Str::lower($str1);
//        echo "<br>";
        //in hoa
//        echo Str::upper($str1);
        //3. Tạo chuỗi ngẫu nhiên
//        echo Str::random(20);
        //4.Loại bỏ kí tự dư thừa trươc sau và năm giữa các từ
//        $str2 = Str::of('  phan Hoang      Trung   ')->trim();
//        echo $str2;
        //5.Lấy chuỗi con trong 1 chuỗi, vị trí lấy(chạy từ 0) và số kí tự lấy ra
//        $str3 = 'Hoang hieu';
//        echo Str::of($str3)->substr(3,2);
        //6. Tạo slug làm link thân thiện
//        echo Str::slug($str1);
        //7.Nối chuỗi vào cuối chuỗi cho trước
//        echo Str::of($str1)->append('Là một master');
        //8.Tìm kiếm và thay thế trong chuỗi
//        echo Str::of($str1)->replace("Trung","Hiếu");
        //9.Cắt chuỗi, lấy với số kí tự cho trước
        $str4 = "Viễn thông Quân đội (Viettel) đã công bố tái định vị thương hiệu Viettel, với bộ nhận diện gồm logo và slogan mới";
//        echo Str::of($str4)->limit(50);
        //10. Kiểm tra chuỗi con có nằm trong chuỗi cha hay không
        echo Str::contains($str4,'thông');





    }
}
