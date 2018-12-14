<?php

/**
 * 表示一种作用于对象结构中各元素的操作,在不改变各元素的前提下定义作用于这些元素的新操作.
 * 抽象类,继承某种状态,根据状态有不同的反应.
 * 分类稳定,则与Visitor中添加分类反应的方法.抽象类中拥有accept方法用于获取状态对象.每一种状态继承具体状态抽象类,实现分类的反应方法.
 *
 * Element->人;Visitor->状态;Object->对象结构;
 * 稳定数据结构,易于变化的算法,此种情况很适用.算法操作的增加很容易.新增数据结构难.
 * 新增访问者易,此模式将访问者行为集中到一个访问对象中.
 * 它把数据结构和作用于结构上的操作之间的耦合解开,使得操作集合可以相对自由的演化.
 * 目的:把处理从数据结构中分离.
 * 开放封闭原则
 */

abstract class Visitor
{
    abstract function manAction(Man $man);

    abstract function womanAction(Woman $woman);
}

abstract class People
{
    abstract function accept(Visitor $action);
}

class Man extends People
{
    private $_name;

    public function __construct($name = 'Hi man ')
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    #具体状态作为参数传递给类完成一次分派,类调用具体状态方法反应,同时将自己作为参数传递
    function accept(Visitor $action)
    {
        $action->manAction($this);
    }
}

class Woman extends People
{
    private $_name;

    public function __construct($name = 'Hi woman ')
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    function accept(Visitor $action)
    {
        $action->womanAction($this);
    }
}

class Success extends Visitor
{
    function manAction(Man $man)
    {
        echo $man->getName() . "success \n";
    }

    function womanAction(Woman $woman)
    {
        echo $woman->getName() . "success \n";
    }
}

class Failing extends Visitor
{
    function manAction(Man $man)
    {
        echo "fail man \n";
    }

    function womanAction(Woman $woman)
    {
        echo "fail woman \n";
    }
}

class Happy extends Visitor
{
    function manAction(Man $man)
    {
        echo "happy man \n";
    }

    function womanAction(Woman $woman)
    {
        echo "happy woman \n";
    }
}

//高层接口访问
class Object
{
    private $_list = array();

    public function attach(People $people)
    {
        array_push($this->_list, $people);
    }

    public function detach(People $people)
    {
        $index = array_search($people, $this->_list);
        if ($index !== false) {
            unset($this->_list[$index]);
        }
        return $index;
    }

    public function doAction(Visitor $action)
    {
        foreach ($this->_list as $people) {
            $people->accept($action);
        }
    }
}

$os = new Object();
$man = new Man();
$woman = new Woman();
$success = new Success();
$os->attach($man);
$os->attach($woman);
$os->doAction($success);
