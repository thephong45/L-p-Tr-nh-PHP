<?php

function construct()
{
//    echo "Dùng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
    load('lib', 'email');


}

function regAction()
{
    global $error, $username, $fullname, $password, $email;
//    send_email('trungph96act@gmail.com','Phan Hai', 'Kich hoat tai khoang',"<a href='https://www.w3schools.com/'>Xác thực tài khoảng</a>");
    if (isset($_POST["btn_reg"])) {
        $error = [];
        if (empty($_POST['fullname'])) {
            $error["fullname"] = "Không được để trống fullname? ";
        } else {
            $fullname = $_POST['fullname'];
        }

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

        //  Chuẩn hóa email

        if (empty($_POST['email'])) {
            $error["email"] = "Không được để trống email ?";
        } else {
            if (!is_email($_POST['email'])) {
                $error['email'] = "Email không đúng định dạng";
            }
            $email = $_POST['email'];
        }


//    Kết luận
        if (empty($error)) {
            if (!user_exists($username, $email)) {
                $active_token = md5($username . time());
                $data = [
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'active_token' => $active_token,
                    'reg_date' => time()
                ];
                add_user($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Xin chao bạn {$fullname}</p>
                            <p>Mời bạn click vào đường link này để kích hoạt tài khoảng:{$link_active}</p>
                            <p>Nếu không phải bạn đăng kí thì bỏ qua email này</p>
                            <p>Trung-kma</p>";
                send_email('trungph96act@gmail.com', 'Phan Hai', 'Kich hoat tai khoang', $content);
//                redirect("?mod=users&action=login");
                redirect("?mod=users&action=login_success");
            } else {
                $error['account'] = "email hoac username da ton tại trên hệ thống";
            }

        }

    }
    load_view('reg');

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

function activeAction()
{
    $link_login = base_url("?mod=users&action=login");
    $active_token = $_GET['active_token'];
    if (check_active_token($active_token)) {
        active_user($active_token);
        echo "Kích hoạt thành công!! Vui lòng kích vào link sau để đăng nhập <a href='{$link_login}'>Đăng nhập</a>";
    } else {
        echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoảng đã dc kích hoạt, Vui lòng kích vào link sau để đăng nhập <a href='{$link_login}'>Đăng nhập</a>";
    }

}

function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=users&action=login");
}

function resetAction()
{
    global $error, $username, $password, $email;
    $reset_token = isset($reset_token) ? $_GET['reset_token'] : "";
    if (!empty($reset_token)) {
        if (check_reset_token($reset_token)) {
            if (isset($_POST["btn_new_pass"])) {
//                $error = [];
                if (empty($_POST['password'])) {
                    $error["password"] = "Không được để trống password ? ";
                } else {
                    if (!is_password($_POST['password'])) {
                        $error['password'] = "Mật khẩu không đúng định dạng";
                    }
                    $password = md5($_POST['password']);
                }
                if(empty($error)){
                    $data = [
                        'password' =>  $password
                    ];
                    update_pass($data, $reset_token);
                    redirect("?mod=users&action=resetOk");
                }

            }
            load_view("newpass");


        } else {
            echo "Yêu cầu lấy lại mật khẩu không hợp lệ";
        }
    } else {
        if (isset($_POST["btn_reset"])) {
            $error = [];

            //  Chuẩn hóa email
            if (empty($_POST['email'])) {
                $error["email"] = "Không được để trống email ?";
            } else {
                if (!is_email($_POST['email'])) {
                    $error['email'] = "Email không đúng định dạng";
                }
                $email = $_POST['email'];
            }


//    Kết luận
            if (empty($error)) {
                if (check_email($email)) {
                    echo "email có tồn tại";
                    $reset_token = md5($email . time());
                    $data = [
                        'reset_token' => $reset_token
                    ];
                    //Cập nhật reset pass cho user cần khôi phục
                    update_reset_token($data, $email);


                    //Gửi mail cho người dùng
                    $link = base_url("?mod=users&action=reset&reset_token=$reset_token");
                    $content = "<p>Bạn vui lòng nhấn vào link sau để khôi phục mật khẩu {$link}</p>
                            <p>Nếu không phải bạn thì vui lòng bỏ qua email này</p>
                            <p>Trung-kma</p>";
                    send_email($email, "", "Khôi phục mật khẩu PHP", $content);
                } else {
                    $error['account'] = "email không tồn tại trên hệ thống";
                }

            }

        }
        load_view('reset');
    }

}

function resetOkAction(){
    load_view("resetOk");
}