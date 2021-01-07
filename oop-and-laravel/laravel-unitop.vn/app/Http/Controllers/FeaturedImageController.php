<?php

namespace App\Http\Controllers;

use App\FeaturedImage;
use Illuminate\Http\Request;

class FeaturedImageController extends Controller
{
    //
    public function read(){
        // post la 1 phương thức định nghĩa trong model  FeaturedImage
        $posts = FeaturedImage::find(1)->post;
        return $posts;
    }
}
