<?php
/**
 * 外观模式(Facade):为子系统提供一个一致的界面,定义一个高层接口,使得子系统更容易调用
 * 外观类和子系统类
 * 子系统进行封装,使得高层可以不用了解子系统的实现甚至不用知道子系统的存在.
 *
 * 有意识的分离层与层之间的联系:可在层与层之间建立外观模式
 * 业务发展,子系统越来越复杂,外部调用成本增加,外观模式可封装成为一个简单的接口,减少依赖.
 * 客户端只需要与Facade进行交互而避免了与子系统之间的复杂逻辑处理
 *
 * 或许可以用于之后软装开发涉及的套餐关联中,套餐对应服务的具体套餐情况.套餐作为展示,而套餐中的子服务作为子系统,封装一个高层的门面系统用于客户调用.
 *
 * 中介类对象作为代理,功能委托给原对象.
 * 外观模式和代理模式区别在于,代理模式倾向于对原对象的代理控制,而门面是对多个类对象的组合使用.
 */

abstract class System{
    abstract function operation();
}

class SubSystemA extends System
{
    public function operation()
    {
        echo 'SystemA operate' . "\n";
    }
}

class SubSystemB extends System
{
    public function operation()
    {
        echo 'SystemB operate' . "\n";
    }
}

class SubSystemC extends System
{
    public function operation()
    {
        echo 'SystemC operate' . "\n";
    }
}

class SubSystemD extends System
{
    public function operation()
    {
        echo 'SystemD operate' . "\n";
    }
}

class Facade
{
    protected $_systemA;
    protected $_systemB;
    protected $_systemC;
    protected $_systemD;

    public function __construct()
    {
        $this->_systemA = new SubSystemA();
        $this->_systemB = new SubSystemB();
        $this->_systemC = new SubSystemC();
        $this->_systemD = new SubSystemD();
    }

    public function comboA()
    {
        $this->_systemA->operation();
        $this->_systemC->operation();
        $this->_systemD->operation();
    }

    public function comboB()
    {
        $this->_systemA->operation();
        $this->_systemB->operation();
        $this->_systemC->operation();
    }
}

$facade = new Facade();
$facade->comboA();
