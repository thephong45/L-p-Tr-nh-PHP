<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'user_id', 'votes', 'thumbnail'];

    //Định nghĩa 1 phương thức mối qua hệ post model -> FeaturedImage model
    //return $this->hasOne('App\FeaturedImage','ten khóa ngoại', 'tên khóa chính');
    public function FeaturedImage(){

        return $this->hasOne('App\FeaturedImage');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
