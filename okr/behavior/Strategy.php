<?php
/**
 * 策略模式:定义家族算法,分别封装使之间可相互替换
 * 可以有深入的结合
 * 具体算法之间可以通过不同的构造实现想要的目的.
 * 策略模式是一种定义一系列算法的方法,从概念来看所有方法工作相同只是实现不同.它可以以相同方式调用所有算法,减少各种算法类与使用算法类之间的耦合.
 * Strategy类层为Context定义了一系列的可供重用的算法或行为,继承有助于析取出这些算法中的公共功能.
 * 策略模式的优点是简化了单元测试,每个算法拥有自己的类,可以通过自己的接口单独测试;易于扩展,策略类之间可自由切换;避免判断多重条件.
 * 对客户端的使用要求较高.策略对客户端暴露.
 *
 * 策略模式传实例,工厂模式传标识
 * 封装任何类型的规则,分析过程中需要再不同时间应用不同的业务规则,就可以考虑使用策略模式.
 */

abstract class Strategy
{
    abstract function algorithmInterface();
}

class ConcreteStrategyA extends Strategy
{
    function algorithmInterface()
    {
        echo 'StrategyA' . "\n";
    }
}

class ConcreteStrategyB extends Strategy
{
    function algorithmInterface()
    {
        echo 'StrategyB' . "\n";
    }
}

class StrategyContext
{
    private $_strategy;

    public function __construct(Strategy $strategy)
    {
        $this->_strategy = $strategy;
    }

    public function contextInterface()
    {
        $this->_strategy->algorithmInterface();
    }
}

$context = new StrategyContext(new ConcreteStrategyA());
$context->contextInterface();

#工厂模式
//ContextFactory->createStrategy('StrategyA')->algorithmInterface();
#策略模式
//StrategyContext(StrategyA)->algorithmInterface();