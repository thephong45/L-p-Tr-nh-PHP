<?php
class demo{
    private $attr1;


    public function setValue($value)
    {
        $this->attr1 = $value;
    }


    public function getValue()
    {
        return $this->attr1;
    }
}

$a = new demo();
$a->setValue(10);
echo $a->getValue();