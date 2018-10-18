<?php
/*
 * 状态模式当一个对象的内在状态改变时允许改变其行为，这个对象看起来像是改变了其类。
 * 状态模式主要解决的是当控制一个对象状态的条件表达式过于复杂时的情况。把状态的判断逻辑转移到表示不同状态的一系列类中，可以把复杂的判断逻辑简化。
 * 上下文环境（Work）：它定义了客户程序需要的接口并维护一个具体状态角色的实例，将与状态相关的操作委托给当前的具体对象来处理。
 * 抽象状态（State）：定义一个接口以封装使用上下文环境的的一个特定状态相关的行为。
 * 具体状态（AmState）：实现抽象状态定义的接口
*/


interface State
{
    public function handle(Context $context);
}

class ConcreteStateA implements State
{
    private static $_instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new ConcreteStateA();
        }
        return self::$_instance;
    }

    public function handle(Context $context)
    {
        echo 'concrete_a' . "<br>";
        $context->setState(ConcreteStateB::getInstance());
    }

}

class ConcreteStateB implements State
{
    private static $_instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new ConcreteStateB();
        }
        return self::$_instance;
    }

    public function handle(Context $context)
    {
        echo 'concrete_b' . "<br>";
        $context->setState(ConcreteStateA::getInstance());
    }
}

class Context
{
    private $_state;

    public function __construct()
    {
        $this->_state = ConcreteStateA::getInstance();
    }

    public function setState(State $state)
    {
        $this->_state = $state;
    }

    public function request()
    {
        $this->_state->handle($this);
    }
}

$context = new Context();
$context->request();
$context->request();
/* 输出：
concrete_a
concrete_b */
?>