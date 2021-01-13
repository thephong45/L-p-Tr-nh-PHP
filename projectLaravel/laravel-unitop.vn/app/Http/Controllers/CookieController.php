<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    //============= Phần 17 ================
    public function set(){
        //Thiết lập cookie
        $response = new Response();
        return $response->cookie('unitop','Hoc web php',  60 * 30);

    }

    public function get(Request $request){
        return $request->cookie('unitop');

    }
}
