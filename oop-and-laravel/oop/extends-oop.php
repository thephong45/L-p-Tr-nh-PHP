<?php

class A{
    public $attr1 = 10;

    public function method1(){
        echo "OK nhé";
    }
}


class B extends A{
    public $attr2;
    public function method2()
    {
        return $this->attr1;

    }
}

$b = new B();
$b->method1();
echo $b->method2();