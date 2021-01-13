<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    //Lấy các user đang sử dụng quyền đó
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
