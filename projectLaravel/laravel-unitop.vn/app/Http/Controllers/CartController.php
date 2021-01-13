<?php

namespace App\Http\Controllers;




use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function show(){


        return view('cart.show');
    }

    //Thêm sản phẩm vào cart
    public function add(Request $request, $id){
        $products = Product::find($id);
//        Cart::destroy();

        Cart::add([
            'id' => $products->id,
            'name' => $products->name,
            'qty' => 1,
            'price' => $products->price,
            'options' => ['thumbnail' => $products->thumbnail]
        ]);

//        echo "<pre>";
//        print_r(Cart::content());
//        echo "</pre>";

        return redirect('cart/show');


    }

    public function remove($rowId){
        Cart::remove($rowId);
        return redirect('cart/show');
    }

    public function destroy(){
        Cart::destroy();
        return redirect('cart/show');
    }

    public function update(Request $request){
//        dd($request->all());
        $data = $request->get('qty');
//        var_dump($data);
        foreach ($data as $key => $value){
            Cart::update($key, $value);


        }
        return redirect('cart/show');
    }
}
