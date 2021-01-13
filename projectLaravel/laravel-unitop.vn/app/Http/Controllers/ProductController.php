<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


//    function show($id){
//        return "Thông tin san pham có id: $id";
//        ['id'=> $id, 'price'=>$price], thay vì dùng mảng để truyền sang view
//        thì ta có thể dùng compact-> chuyển biến về mảng có key là tên biến, value là giá trị của biến
//        $price = 4000;
//        $color = ['red', 'white'];
//        return view('product.show', compact('id','price', 'color'));




//    }




    function create(){
        return view('product.create');
    }

    function update($id){
        return "Cập nhật sản phẩm có id : {$id} " ;
    }


    //======================= Phần 21 ===========================
    public function show(){

        //Sử dụng product lấy tất cả các phần tử trong bảng product
        $products = Product::all();

        return view('product.show', compact('products'));
    }








}
