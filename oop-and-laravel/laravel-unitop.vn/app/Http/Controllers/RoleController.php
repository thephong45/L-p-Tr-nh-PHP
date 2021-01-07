<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function show(){
        //Với 1 quyền thì có bao nhiêu user sử dụng
//        $users = Role::find(3)->users;
//        return $users;

        // Xem thử user đó có những quyền nào
        $roles = User::find(3)->roles;
        return $roles;
        //Lấy ra phần tử : $roles[0]->name;
    }
}
