<?php
/**
 * 每个装饰对象的实现与对象的使用分离,我们代码中关于活动价格的计算有所涉及
 *
 */


abstract class DecoratorComponent
{
    abstract function operate();
}

class ConcreteDecoratorComponent extends DecoratorComponent
{
    function operate()
    {
        echo '具体修饰器' . "\n";
    }

}

class DecoratorPhp extends DecoratorComponent
{
    protected  $_component;

    public function setComponent(DecoratorComponent $decoratorComponent)
    {
        $this->_component = $decoratorComponent;
    }

    public function operate(){
        if(!empty($this->_component)){
            return $this->_component->operate();
        }
        return "hello \n";
    }
}

class ConcreteDecorationA extends DecoratorPhp
{

}

class ConcreteDecorationB extends DecoratorPhp
{

}

