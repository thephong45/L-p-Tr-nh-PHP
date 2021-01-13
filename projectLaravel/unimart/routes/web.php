<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//=========== Phần 24: =================
Route::middleware('auth')->group(function (){
    //dashboard là bản điều khiển hiển thị thông tin hệ thống
    Route::get('dashboard', 'DashboardController@show');
    Route::get('admin', 'DashboardController@show');

    Route::get('admin/user/list', 'AdminUserController@list');

    //Thêm user
    Route::get('admin/user/add', 'AdminUserController@add');
    Route::post('admin/user/store', 'AdminUserController@store');


    //Xóa user
    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');

    //Thực hiện tác vụ
    Route::post('admin/user/action', 'AdminUserController@action');
    //Edit
    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user.edit');
    Route::post('admin/user/update/{id}', 'AdminUserController@update')->name('user.update');


});

