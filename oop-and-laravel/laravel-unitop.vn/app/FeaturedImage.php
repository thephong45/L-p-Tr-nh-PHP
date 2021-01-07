<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedImage extends Model
{
    //tương tác với FeaturedImage -> post. Kiểu như hỏi thử FeaturedImage do post nào tạo ra
    public function post(){
        // App\Post là model
        return $this->belongsTo('App\Post');
    }


}
