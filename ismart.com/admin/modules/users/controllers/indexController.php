<?php

function construct()
{
//    echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');


}

function loginAction()
{
    global $error, $username, $password;
    if (isset($_POST["btn_login"])) {
        $error = [];

        //  Chuẩn hóa username
        if (empty($_POST['username'])) {
            $error["username"] = "Không được để trống username? ";
        } else {
            if (!is_username($_POST['username'])) {
                $error['username'] = "Tên đăng nhập không đúng định dạng";
            }
            $username = $_POST['username'];
        }

        //  Chuẩn hóa password

        if (empty($_POST['password'])) {
            $error["password"] = "Không được để trống password ? ";
        } else {
            if (!is_password($_POST['password'])) {
                $error['password'] = "Mật khẩu không đúng định dạng";
            }
            $password = md5($_POST['password']);
        }

//    Kết luận
        if (empty($error)) {
            if (check_login_data($username, $password)) {
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                //Chuyển hướng vào hệ thống
                redirect();
            } else {
                $error['account'] = "Tên đăng nhập hoặc mật khẩu không tồn tại";
            }

        }

    }
    load_view('login');
}

function login_successAction()
{
    load_view('login_success');
}



function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

function resetAction()
{
    load_view('reset');

}

function updateAction(){
    //Cập nhật tài khoảng
    //1.Tạo giao diện
    //2.Load thông tin
    //3.Validation form
    //4.Cập nhật thông tin
    global $error;
    if(isset($_POST['btn_update'])){
        //Kiểm tra
        if (empty($_POST['fullname'])) {
            $error["fullname"] = "Không được để trống fullname? ";
        } else {
            $fullname = $_POST['fullname'];
        }


        if (empty($_POST['phone_number'])) {
            $error["phone_number"] = "Không được để trống phone_number ?";
        } else {
            if (!is_phone_number($_POST['phone_number'])) {
                $error['phone_number'] = "Email không đúng định dạng";
            }
            $phone_number = $_POST['phone_number'];
        }

        //Dia chi
        if (empty($_POST['address'])) {
            $error["address"] = "Không được để trống địa chỉ? ";
        } else {
            $address = $_POST['address'];
        }

        if(empty($error)){
            //update
            $data = [
                'fullname' => $fullname,
                'phone_number' => $phone_number,
                'address' => $address
            ];

            update_user_login(user_login(), $data);


        }


    }
    $info_user = get_user_by_username(user_login());
//    show_array($info_user);
    $data['info_user'] =  $info_user;

    load_view('update', $data);
}
