<?php
/**
 * 策略模式主要为了让客户类能够更好地使用某些算法而不需要知道其具体的实现
 */

interface Strategy
{
    public function method();
}

class ConcreteStrategyA implements Strategy
{
    public function method()
    {
        echo "A\n";
    }
}

class ConcreteStrategyC implements Strategy
{
    public function method()
    {
        echo "C\n";
    }
}

class ConcreteStrategyB implements Strategy
{
    public function method()
    {
        echo "B\n";
    }
}

class Question
{
    private $_strategy;

    public function __construct(Strategy $strategy)
    {
        $this->_strategy = $strategy;
    }

    public function handleStrategy()
    {
        $this->_strategy->method();
    }
}

$question = new Question(new ConcreteStrategyA());
$question->handleStrategy();
$question = new Question(new ConcreteStrategyB());
$question->handleStrategy();
