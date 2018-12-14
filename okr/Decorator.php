<?php
/**
 * 装饰模式：
 * 新功能加于旧的类时，需要在主类中添加相应的字段、方法和逻辑，从而增加了主类的复杂度。
 * 当这些行为只有在特定情况才执行时，则可以采用修饰器的模式按照需要有序的包装对象。
 * 可以有效的将类的核心功能和装饰功能区分。该模式需要注意装饰的顺序。
 *
 * 被装饰的类和装饰具体操作类
 *
 * 当前系统中关于某些活动的价格计算时,在读取了数据库规则生成价格后,即采用了装饰器的设计思想,让满足活动条件的房源接受进一步的价格修饰.
*/
interface Component
{
    function operation();
}

//被修饰的对象
class ConcreteComponent implements Component
{
    function operation()
    {
    }
}

//如果只有一个ConcreteComponent被修饰的类,Decorator可extend ConcreteComponent;
abstract class Decorator implements Component
{
    protected $_component;

    public function __construct(Component $component)
    {
        $this->_component = $component;
    }

    public function operation()
    {
        $this->_component->operation();
    }
}

//具体的修饰操作,单实例两次parent调用实现层层封装
class ConcreteDecoratorA extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        echo 'decoratorA exc' . "\n";
    }
}

class ConcreteDecoratorB extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();
        echo 'decoratorB exc' . "\n";
    }
}

$component = new ConcreteComponent();
$concreteDecoratorA = new ConcreteDecoratorA($component);
$concreteDecoratorB = new ConcreteDecoratorB($concreteDecoratorA);
//如果需要可以新增DecoratorC再行封装.
$concreteDecoratorB->operation();