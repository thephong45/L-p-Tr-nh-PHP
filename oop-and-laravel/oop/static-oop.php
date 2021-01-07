<?php
class Rectangle{

    //Thuộc tính
    public static $width;
    public static $height;

    //Phưởng thức
    public function getPerimeter(){
        return 2 * (self::$width * self::$height );
    }

    public function getArea(){
        return self::$width * self::$height;
    }
}


class demo{

    public function __construct()
    {
        Rectangle::$width = 2;
        Rectangle::$height = 30;
        echo Rectangle::getPerimeter();
    }
}

new demo();

