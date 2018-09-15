<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/9/14
 * Time: 下午6:47
 */

interface ComponentDecorator
{
    public function operation();
}

abstract class Decorator implements ComponentDecorator
{
    protected $_component;

    public function __construct(ComponentDecorator $component)
    {
        $this->_component = $component;
    }

    public function operation()
    {
        $this->_component->operation();
    }
}

class ConcreteDecoratorA extends Decorator
{
    public function __construct(ComponentDecorator $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationA();
    }

    public function addOperationA()
    {
        echo "AAA\n";
    }
}

class ConcreteDecoratorB extends Decorator
{
    public function __construct(ComponentDecorator $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        $this->addOperationB();
    }

    public function addOperationB()
    {
        echo "BBB\n";
    }
}

class ConcreteComponent implements ComponentDecorator
{
    public function operation()
    {
    }
}

$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);
$decoratorA->operation();
echo "///\n";
$decoratorB->operation();