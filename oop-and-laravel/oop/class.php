<?php
class Rectangle{

    //Thuộc tính
    public $width;
    public $height;

    //Phương thức

    public function __construct()
    {
        //Những cái gì muốn chạy đầu tiên thì cho vào đây
        // Tự động được chạy khi lớp này khởi tạo
        $this->width = 20;
        $this->height = 10;
    }


    public function getPerimeter(){
        return 2 * ($this->width * $this->height);
    }

    public function getArea(){
        return $this->width * $this->height;
    }
}

//Khởi tạo 1 dối tượng
$a = new Rectangle();
//Truy xuất vào phương thức
echo $a->getPerimeter();
echo $a->getArea();
