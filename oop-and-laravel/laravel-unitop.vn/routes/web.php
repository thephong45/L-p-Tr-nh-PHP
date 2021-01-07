<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Post;
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

//==================
//đinh tuyen co ban
//==================

//Route::get('/post',function (){
//    return "Đây là trang bài viết";
//});
//
//Route::get('/admin/product', function (){
//    return 'Đây la trang quản lý sản phẩm';
//});
//
////Định tuyến có tham số
//Route::get('posts/{id}', function ($id){
//    return $id;
//});
//
//Route::get('posts/{cat_id}/page/{page}', function ($cat_id, $page){
//    return $cat_id . '-' . $page;
//});

//=====================
//Đặt tên cho định tuyến
//=====================
//
//Route::get('users/profile', function (){
//    return route('profile');
//}) -> name('profile');
//
//Route::get('/admin/product/add', function (){
//    return route('product.add');
//})->name('product.add');

//=====================
//Định tuyến tham số tùy chọn
//domain.com/users => Hien thị ra danh sách users
//domain.com/users/4 => Hiển thị thông tin của người dùng có id = 4
//=====================
//Route::get('/users/{id?}', function ($id = 0){
//    return $id;
//});

//=====================
// Định tuyến với tham số có ràng buộc biểu thức chính quy
//=====================
//Route::get('product/{id}', function ($id){
//    return $id;
//}) ->where('id', '[0-9]+');

//Route::get('product/{id}', function ($id){
//    return $id;
//}) ->where(['id'=>'[0-9]+']);

//Route::get('product/{slug}/{id}', function ($slug, $id){
//    return $id . '---' . $slug;
//}) ->where(['slug' => '[A-Za-z0-9-_]+']);

//Định tuyến qua 1 view gồm đường dẫn và tên view, dữ liệu cần chuyển qua view
//Route::view('/welcome', 'welcome');
//Route::view('/post', 'post', ['id' => 10]);

//Định tuyến qua controller: đường dẫn, tên contronller@ tên action
//Route::get('/post/{id}', 'PostController@detail');

//=============================================
// Bài tập phần 5: tạo quản lý bài viết trong admin gồm:
// Trang thêm bài viết, trang danh sách bài viết, cập nhật bài viết, trang xóa bài viết

//Route::get('/admin/post/add', function (){
//   return "Trang thêm bài viết";
//});
//
//Route::get('/admin/post/show', function (){
//    return "Trang danh sách bài viết";
//});
//
//Route::get('/admin/post/update/{id}', function ($id){
//    return "Trang cập nhật bài viết có id = {$id}";
//});
//
//Route::get('/admin/post/delete/{id}', function ($id){
//    return "Trang xóa bài viết với id = {$id}";
//});


//============Phần 6: Contronller=============
//============================================
//Route::get('product/show/{id}', 'ProductController@show');
//Route::get('product/create', 'ProductController@create');
//Route::get('product/update/{id}', 'ProductController@update');


//Định tuyến theo module resource
//Route::resource('post', 'PostController');

//Bài tập controller: Phần 6
//Route::get('admin/post/add', 'AdminPostController@add');
//Route::get('admin/post/show', 'AdminPostController@show');
//Route::get('admin/post/update/{id}', 'AdminPostController@update');
//Route::get('admin/post/delete/{id}', 'AdminPostController@delete');

//============================= Phần 7 =============================

//Route::get("/post", 'PostController@index');
//Route::get('/child', function (){
//    return view('child',['data'=> 9, 'post_title'=> 'Khóa học laravel pro']);
//});
//
//Route::get("/demo", function (){
//    $n = 20;
//    $users = [
//        1 => [
//            'name' => 'Phan Hoang Trung'
//        ],
//        2 => [
//            'name' => 'Phan Hoang Hieu'
//        ],
//        3 => [
//            'name' => 'Phan Thanh Binh'
//        ],
//        4 => [
//            'name' => 'Vo My Le'
//        ]
//
//    ];
//    return view('demo', compact('n','users'));
//});

//========================Bài tập phần 7=======================

//Route::get('admin/post/add', 'AdminPostController@add');
//Route::get('admin/post/show', 'AdminPostController@show');
//Route::get('admin/post/update/{id}', 'AdminPostController@update');
//Route::get('admin/post/delete/{id}', 'AdminPostController@delete');

//============Route để insert dữ liệu bằng query builder==================
//Route::get('users/insert', function (){
//    DB::table('users')->insert(['name'=>'Phan Hoàng Hà', 'email'=>'ha96act@gmail.com', 'password'=>bcrypt('Vanha@123')]);
//
//});
//
//Route::get('posts/add', 'PostController@add');
//Route::get('posts/show', 'PostController@show');
//Route::get('posts/update/{id}', 'PostController@update');
//Route::get('posts/delete/{id}', 'PostController@delete');


//================= Bài tập phần 9 ====================
//Route::get('admin/product/add', 'AdminProductController@add');
//Route::get('admin/product/show', 'AdminProductController@show');
//Route::get('admin/product/update/{id}', 'AdminProductController@update');
//Route::get('admin/product/delete/{id}', 'AdminProductController@delete');

//================== Phần 10: Elequet ORM ===========================
//Xử lý: lấy bảng ghi trên route
//Route::get('posts/read', function (){
//    //Phải use ở đầu
//   $posts = Post::all();
//   return $posts;
//});

//Xử lý: lấy bảng ghi trên controller
//Route::get('posts/read', 'PostController@read');
//Route::get('posts/restore/{id}', 'PostController@restore');
//Route::get('posts/permanentlydelete/{id}', 'PostController@permanentlyDelete');

//========== Phần 10 =============
//Route::get('images/read', 'FeaturedImageController@read');
//Route::get('role/show', 'RoleController@show');

//========== Phần 12: FORM ==================
Route::get('post/add', 'PostController@add');
Route::post('post/store', 'PostController@store');
Route::any('user/reg', function () {
    return view('user/reg');

});

Route::get('post/show','PostController@show')->name('post.show');











