<?php

/**
 * State:当一个对象的内在状态改变时允许改变其行为,这个对象看起来像是改变了其类.
 * 主要解决当控制一个对象状态转换的条件表达式过于复杂的情况,把状态判断的逻辑转移到表示不同状态的一系列类中,可以把复杂逻辑简化.
 * 面向对象设计,代码责任分解.
 * State->handle();Context->request();
 * 将与特定状态的行为局部化,并且将不同状态的行为分割开.新增子类即可添加新的状态转换.消除庞大的条件分支语句.
 * 状态模式通过把各种状态转移逻辑分布到State子类之间,减少相互依赖.
 * 当一个对象的行为取决于它的状态,并且它必须在运行时刻根据状态改变行为是,即可考虑状态模式.
 */

class Context
{
    private $_state;

    function __construct(State $state)
    {
        $this->_state = $state;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function setState($state)
    {
        $this->_state = $state;
    }

    public function request()
    {
        $this->_state->handle($this);
    }
}

abstract class State
{
    abstract function handle(Context $context);
}

class ConcreteStateA extends State
{
    function handle(Context $context)
    {
        $context->setState(new ConcreteStateB());
    }
}

class ConcreteStateB extends State
{
    function handle(Context $context)
    {
        $context->setState(new ConcreteStateC());
    }
}

class ConcreteStateC extends State
{
    function handle(Context $context)
    {
        $context->setState(new ConcreteStateA());
    }
}

$conStateA = new ConcreteStateA();
$context = new Context($conStateA);
var_dump($context->getState());
$context->request();
var_dump($context->getState());
$context->request();
var_dump($context->getState());
