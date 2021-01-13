<?php

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

//=========== Phần 23: Chạy middleware đầu tiên ====================
//Route::get('admin/{age}', function (){
//    return view('admin');
//})->middleware('CheckAge');

//========= Chạy middleware trên controller ===============
//Route::get('admin/{age}', 'AdminController@index');
//Route::get('admin/show/{age}', 'AdminController@show');

//========== Phân quyền ===================


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/dashboard', 'AdminController@dashboard');

//Áp dụng middleware trên nhiều route
Route::middleware('auth','CheckRole')->group(function (){
    Route::get('admin/dashboard', 'AdminController@dashboard');
});
