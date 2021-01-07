<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{

    //=================== Bài tập phần 9 ====================
    //Thêm, select, update, delete
    public function add(){
        DB::table('products')->insert(['name'=>'Xiaomi note 8', 'price'=>25000,'product_cat_id'=>1, 'user_id'=> 7]);
    }

    public function show(){
        $products = DB::table('products')->get();
        echo "<pre>";
        print_r($products);
        echo "</pre>";

    }

    public function update($id){
        DB::table('products')->where('id', $id)
            ->update([
                'name'=> 'Macbook 2020 ',
                'price'=> 800000
            ]);
    }

    public function delete($id){
        return DB::table('products')->where('id', $id)
            ->delete();
    }

}
