<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoController extends Controller
{

    function sendmail(){
        $data = [
            'content'=>'Dữ liệu email được truyền từ controller'
        ];
        Mail::to('hoangtrung26d@gmail.com')->send(new DemoMail($data));
    }

}
