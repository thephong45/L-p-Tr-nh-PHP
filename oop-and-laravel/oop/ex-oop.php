<?php
//Bài tập oop
class User{

    //Thuộc tính
    private $username;
    private $password;
    private $db_username = "unitop";
    private $db_password = 'trungphan';

    //Phương thức
    public function setInfo($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function  checkLogin(){
        //Kiểm tra và xuất thông báo
        if($this->username == $this->db_username && $this->password == $this->db_password){
            echo "Xin chao: " . $this->username;
        }else{
            echo "User không tồn tại trên hệ thống";
        }
    }

}

//Khởi tạo đối tượng
$user =  new User();
$user->setInfo("unitop", "trungphan");
$user->checkLogin();