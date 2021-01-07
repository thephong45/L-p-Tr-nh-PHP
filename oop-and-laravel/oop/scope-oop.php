<?php
class demo{
    public $attr1;
    private $attr2 = 10;

    public function show(){
        return $this->attr2;
    }


}

$a = new demo();
echo $a->attr1 = 20;
echo $a->show();