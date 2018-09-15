<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/9/14
 * Time: 下午4:56
 * 原型模式
 */

interface ProtoType
{
    function copy();
}

class ConcretePrototype implements ProtoType
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    function copy()
    {
        return clone $this;
    }
}

class Test
{

}

$obj1 = new ConcretePrototype(new Test());
var_dump($obj1);
$obj2 = $obj1->copy();
var_dump($obj2);