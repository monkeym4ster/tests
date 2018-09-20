<?php
/**
 * 这种模式有另一种称呼：控制链模式。
 * 它主要由一系列对于某些命令的处理器构成，
 * 每个查询会在处理器构成的责任链中传递，
 * 在每个交汇点由处理器判断是否需要对它们进行响应与处理。
 * 每次的处理程序会在有处理器处理这些请求时暂停。
 */

abstract class ResponsibilityChain
{
    protected $_next;

    public function setNext(ResponsibilityChain $rc)
    {
        $this->_next = $rc;
        return $this;
    }

    abstract public function operate();
}

class ResponsibilityA extends ResponsibilityChain
{
    public function __construct()
    {
    }

    public function operate()
    {
        echo "1\n";
        var_dump($this);
        if (is_null($this->_next) == false) {
            $this->_next->operate();
            echo "A\n";
        }
    }
}

class ResponsibilityB extends ResponsibilityChain
{
    public function __construct()
    {
    }

    public function operate()
    {
        echo "2\n";
        var_dump($this);
        if (is_null($this->_next) == false) {
            $this->_next->operate();
            echo "B\n";
        }
    }
}

$chainA = new ResponsibilityA();
$chainB = new ResponsibilityB();
$chainA = $chainA->setNext($chainB);
$chainA->operate();