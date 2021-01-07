<?php
require "config.php";
class DB{
    public $conn;

    //database tự động chạy
    public function __construct()
    {
        $this->connection();
    }

    //==========================
    //kêt nối database
    //==========================

    public function connection(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($this->conn->connect_error){
            die("Ket noi khong thanh cong".$this->conn->connect_error);
        }else{
//            echo "Ket noi CSDL thanh cong";
        }
    }

    //==========================
    //Tạo bộ lọc chuỗi, khi có kí tự đặc biệt hay kí tự gây hại cho database
    //==========================

    public function escape_string($str){
        return $this->conn->real_escape_string($str);
    }

    //==========================
    //run  câu lệnh sql
    //==========================

    public function query($sql){
        return $this->conn->query($sql);
    }

    //==========================
    //insert dữ liệu vào database
    //==========================
    public function insert($table, $data = []){
        //Lấy cột và giá trị trong mảng data truyền vào
        foreach ($data as $key => $value){
            $list_field[] = "`{$key}`";
            $list_value[] = "'{$this->escape_string($value)}'";
        }

        //Nhóm thành chuỗi cách nhau dấu phẩy để đưa vào câu truy vấn
        $list_field = implode(",", $list_field);
        $list_value = implode(",", $list_value);

        //Tạo câu lệnh truy vấn
        $sql = "INSERT INTO {$table} ({$list_field}) VALUES ({$list_value})";
//        echo $sql;

        // Tiến hành truy vẫn vào database
        if($this->query($sql)){
            //đúng thì trả về id của bản ghi insert
            return $this->conn->insert_id;

        }
        else{
            echo "lỗi: " . $this->conn->error;
        }

    }

    //==========================
    //Select dữ liệu từ database
    //==========================
    public function get($table, $field = [], $where = ''){
        $field = (!empty($field)) ? implode(",", $field) : "*";
        $where = (!empty($where)) ? "WHERE {$where}" : "";

        //Tạo câu SQL
        $sql = "SELECT {$field} FROM {$table} {$where}";
        $result = $this->query($sql);

        //Kiểm tra số lượng bản ghi
        if($result -> num_rows > 0){
            $data = [];
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }

            //Nếu nhiều bản ghi
            if(count($data) > 1){
                return $data;
            }
            return $data[0]; //Nếu chỉ có 1 bản ghi

        }else{
            echo "Không tìm thấy bản ghi";
        }

    }

    //==========================
    //Update dữ liệu vào database
    //update table_name set column1 = value1, column2 = value2,.. where condition
    //==========================
    public function update($table, $data = [], $where = ''){
        $data_insert = [];
        foreach ($data as $key => $value){
            $data_insert[] = "`{$key}` = '{$value}'";
        }
        $data_insert = implode(",",$data_insert);
        $where = (!empty($where)) ? "WHERE {$where}" : "";

        if($this->query($sql)){
            echo "Cap nhat thanh cong";
        }
        else{
            echo "Lỗi: ".$this->conn->error;
        }

    }

    //==========================
    //deleta dữ liệu trong database
    //delete from table_name where condition
    //==========================
    public function delete($table, $where = ""){
        $where = (!empty($where)) ? "WHERE {$where}" : "";
        $sql = "DELETE FROM {$table} {$where}";
//        echo $sql;
        if($this->query($sql)){
            echo "Xoa thanh cong";
            return "1";
        }else{
            echo "Lỗi: " . $this->conn->error;
        }


    }




}

$db = new DB();

//Insert data
//$data = [
//    'username' => "Vo My Le",
//    'password' => md5("Le@123"),
//];
//$db->insert('users', $data);

//================
//Select data
//$result = $db->get('users',[], 'user_id = 1');
//echo "<pre>";
//var_dump($result);
//echo "</pre>";

//==================
//update data
//$data = [
//    'username' => "Phan văn hiếu",
//    'password' => md5("Hieu@123"),
//];
//$db->update('users', $data, "user_id = 1");

//===========================
//Delete data
$db->delete("users", "user_id = 3");
