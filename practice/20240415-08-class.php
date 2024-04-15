<?php

class Person
{
    # 屬性宣告
    public $name;
    public $mobile;
    private $sno = 'secret';

    function __construct($name, $mobile)
    {
        $this->name = $name;
        $this->mobile = $mobile;
    }
}

$p1 = new Person('Peter', '0935'); # 建立新的個體 (instance 實體, 實例)
# $p1->sno = "123"; # 私有屬性, 只能在類別裡使用

echo " $p1->name: $p1->mobile <br>";

