<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/9/14
 * Time: 下午5:31
 */

interface Target
{
    function method1();

    function method2();
}

class Adaptee
{
    function method1()
    {
        echo '++++++++++' . "\n";
    }
}

class Adaptor implements Target
{
    private $_adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->_adaptee = $adaptee;
    }

    function method1()
    {
        $this->_adaptee->method1();
    }

    function method2()
    {
        echo '---------' . "\n";
    }
}

$adaptor = new Adaptor(new Adaptee());
$adaptor->method1();
$adaptor->method2();


//类适配,上部分是对象适配
interface Target2
{
    public function method1();

    public function method2();
}

class Adaptee2
{
    function method1()
    {
        echo '++++++++++' . "\n";
    }
}

class Adaptor2 extends Adaptee2 implements Target2
{
    public function method2()
    {
        echo '---------' . "\n";
    }
}

$adaptor2 = new Adaptor2();
$adaptor2->method2();
$adaptor2->method1();
