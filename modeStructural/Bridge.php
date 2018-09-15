<?php
/**
 * 将抽象部分与它的实现部分分离，使他们都可以独立的变抽象与它的实现分离，即抽象类和它的派生类用来实现自己的对象
 * 桥接与适配器模式的关系（适配器模式上面已讲解）：
 * 桥接属于聚合关系，两者关联 但不继承
 * 适配器属于组合关系，适配者需要继承源
 */

abstract class Implementor
{
    abstract public function operationImp();
}

class ConcreteImplementorA extends Implementor
{
    public function operationImp()
    {
        echo "A\n";
    }
}

class ConcreteImplementorB extends Implementor
{
    public function operationImp()
    {
        echo "B\n";
    }
}

abstract class Abstraction
{
    protected $_imp;

    public function operation()
    {
        $this->_imp->operationImp();
    }
}

class RefinedAbstraction extends Abstraction
{
    public function __construct(Implementor $imp)
    {
        $this->_imp = $imp;
    }

    public function operation()
    {
        $this->_imp->operationImp();
    }
}

$abstractionA = new RefinedAbstraction(new ConcreteImplementorA());
$abstractionA->operation();
$abstractionB = new RefinedAbstraction(new ConcreteImplementorB());
$abstractionB->operation();
