<?php
/**
 * 模板模式准备一个抽象类，将部分逻辑以具体方法以及具体构造形式实现，然后声明一些抽象方法来迫使子类实现剩余的逻辑。
 * 不同的子类可以以不同的方式实现这些抽象方法，从而对剩余的逻辑有不同的实现。
 * 先制定一个顶级逻辑框架，而将逻辑的细节留给具体的子类去实现。
 */

abstract class TemplateMethod
{
    abstract protected function primitiveOperate1();

    abstract protected function primitiveOperate2();

    public function doMethod()
    {
        $this->primitiveOperate1();
        $this->primitiveOperate2();
    }
}

class ConcreteMethod extends TemplateMethod
{
    protected function primitiveOperate2()
    {
        echo "2\n";
    }

    protected function primitiveOperate1()
    {
        echo "1\n";
    }
}

$cc = new ConcreteMethod();
$cc->doMethod();
