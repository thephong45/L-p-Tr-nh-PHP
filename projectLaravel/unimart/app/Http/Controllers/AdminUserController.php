<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            session(['module_active'=>'user']);
            return $next($request);
        });
    }

    public function list(Request $request){
        //Lấy trạng thái và onlytrash in ra các user đã bị xóa tạm thời

        $status = $request->input('status');
        $list_act = ['delete' => 'Xóa tạm thời'];

        if($status=='trash'){
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
                ];
            $users = User::onlyTrashed()->paginate(2);
        }
        else{
            // Chức năng tìm kiếm
            $keyword = '';
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
            }

            //User::all() là lấy tất cả user, User::paginate(2): số user trên 1 trang
            $users = User::where('name', 'LIKE', "%{$keyword}%")->paginate(2);
        }

        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();
        $count = [$count_user_active, $count_user_trash];


        return view('admin.user.list',compact('users', 'count', 'list_act'));
    }

    public function add(Request $request){

        return view('admin.user.add');
    }

    public function store(Request $request){


        //validate dữ liệu
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|max:255|confirmed',
                'password_confirmation' => 'required|min:8|same:password'

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài tối đa :max kí tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',

            ],
            [
                'name' => 'Tên người dùng',
                'email' => 'Email',
                'password' => 'Mật khẩu'

            ]
        );
//

        //Thêm dũ liệu vào data
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


//        chuyển hướng về trang danh sách
        return redirect('admin/user/list')->with('status','Đã thêm user thành công');




    }


    public function delete($id){
        if(Auth::id()!=$id){
            $user = User::find($id);
            $user->delete();

            return redirect('admin/user/list')->with('status', 'Xóa thành công');
        }else{
            return redirect('admin/user/list')->with('status', 'Bạn không thể xóa chính mình khỏi hệ thống');
        }
    }

    public function action(Request $request){
        //Lấy ra mảng list_check, name của checkbox
        $list_check = $request->input('list_check');
        if($list_check){
            //Duyệt mảng list_check và kiem tra có user đang đăng nhập có = phần tử nào trong list_check,
            // nếu bằng thì loại bỏ khỏi mảng list_check bang unset
            //Loại bỏ việc thao tác lên chính bản thân mình
            foreach ($list_check as $key => $value){
                if(Auth::id() == $value){
                    unset($list_check[$key]);
                }
            }

            //Kiểm tra list_check có rỗng hay không
            if(!empty($list_check)){

                //Lấy ra active
                $act = $request->input('act');
                if($act == 'delete'){
                    User::destroy($list_check);
                    return redirect('admin/user/list')->with('status','Bạn đã xóa thành công');
                }

                if($act == 'restore'){
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/user/list')->with('status','Bạn khôi phục thành công');
                }
                //Xóa vĩnh viễn
                if($act == 'forceDelete'){
                    User::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/user/list')->with('status','Bạn đã xóa vĩnh viễn thành công');
                }

            }
            return redirect('admin/user/list')->with('status','Ban không thể xóa tài khoảng chính bạn');


        }else{
            return redirect('admin/user/list')->with('status','Bạn phải chọn phần tử để xóa');
        }

    }


    //Phương thuc edit và update
    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        //validate dữ liệu
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:8|max:255|confirmed',
                'password_confirmation' => 'required|min:8|same:password'

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có độ dài ít nhất :min kí tự',
                'max' => ':attribute có độ dài tối đa :max kí tự',
                'confirmed' => 'Xác nhận mật khẩu không thành công',

            ],
            [
                'name' => 'Tên người dùng',
                'password' => 'Mật khẩu'

            ]
        );
//

        //Thêm dũ liệu vào data
        User::where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);


//        chuyển hướng về trang danh sách
        return redirect('admin/user/list')->with('status','Cập nhật user thành công');
    }

}
