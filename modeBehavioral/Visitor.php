<?php

/**
 * 访问者模式是一种行为型模式，访问者表示一个作用于某对象结构中各元素的操作。
 * 它可以在不修改各元素类的前提下定义作用于这些元素的新操作，即动态的增加具体访问者角色。
 * 访问者模式利用了双重分派。先将访问者传入元素对象的Accept方法中，然后元素对象再将自己传入访问者，之后访问者执行元素的相应方法。
 * 主要角色
 * 抽象访问者角色(Visitor)：为该对象结构(ObjectStructure)中的每一个具体元素提供一个访问操作接口。
 * 该操作接口的名字和参数标识了 要访问的具体元素角色。这样访问者就可以通过该元素角色的特定接口直接访问它。
 * 具体访问者角色(ConcreteVisitor)：实现抽象访问者角色接口中针对各个具体元素角色声明的操作。
 * 抽象节点（Node）角色：该接口定义一个accept操作接受具体的访问者。
 * 具体节点（Node）角色：实现抽象节点角色中的accept操作。
 * 对象结构角色(ObjectStructure)：这是使用访问者模式必备的角色。
 * 它要具备以下特征：能枚举它的元素；可以提供一个高层的接口以允许该访问者访问它的元素；可以是一个复合（组合模式）或是一个集合，如一个列表或一个无序集合(在PHP中我们使用数组代替，因为PHP中的数组本来就是一个可以放置任何类型数据的集合)
 * 适用性
 * 访问者模式多用在聚集类型多样的情况下。在普通的形式下必须判断每个元素是属于什么类型然后进行相应的操作，从而诞生出冗长的条件转移语句。
 * 而访问者模式则可以比较好的解决这个问题。对每个元素统一调用element−>accept(visitor)即可。
 * 问者模式多用于被访问的类结构比较稳定的情况下，即不会随便添加子类。访问者模式允许被访问结构添加新的方法。
 *
 * 定义两个通用接口,实现两个
 */

//抽象访问者角色
interface Visitor
{
    public function visitConcreteElementA(ConcreteElementA $elementA);

    public function visitConcreteElementB(ConcreteElementB $elementB);
}

//抽象节点角色
interface Element
{
    public function accept(Visitor $visitor);
}

//具体的访问者1
class ConcreteVisitor1 implements Visitor
{
    public function visitConcreteElementA(ConcreteElementA $elementA)
    {
        echo "1_A\n";
    }

    public function visitConcreteElementB(ConcreteElementB $elementB)
    {
        echo "1_B\n";
    }
}

//具体的访问者2
class ConcreteVisitor2 implements Visitor
{
    public function visitConcreteElementA(ConcreteElementA $elementA)
    {
        echo "2_A\n";
    }

    public function visitConcreteElementB(ConcreteElementB $elementB)
    {
        echo "2_B\n";
    }
}

//具体元素A
class ConcreteElementA implements Element
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    // 接受访问者调用它针对该元素的新方法
    public function accept(Visitor $visitor)
    {
        $visitor->visitConcreteElementA($this);
    }
}

// 具体元素B
class ConcreteElementB implements Element
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    // 接受访问者调用它针对该元素的新方法
    public function accept(Visitor $visitor)
    {
        $visitor->visitConcreteElementB($this);
    }
}

//对象结构 即元素的集合
class ObjectStructure
{
    private $_collection;

    public function __construct()
    {
        $this->_collection = array();
    }

    public function attach(Element $element)
    {
        return array_push($this->_collection, $element);
    }

    public function detach(Element $element)
    {
        $index = array_search($element, $this->_collection);
        if ($index !== FALSE) {
            unset($this->_collection[$index]);
        }
        return $index;
    }

    public function accept(Visitor $visitor)
    {
        foreach ($this->_collection as $element) {
            $element->accept($visitor);
        }
    }
}

// client
$elementA = new ConcreteElementA("ElementA");
$elementB = new ConcreteElementB("ElementB");
$elementA2 = new ConcreteElementB("ElementA2");
$visitor1 = new ConcreteVisitor1();
$visitor2 = new ConcreteVisitor2();

$os = new ObjectStructure();
$os->attach($elementA);
$os->attach($elementB);
$os->attach($elementA2);
//$os->detach($elementA2);
//$os->accept($visitor1);
$os->accept($visitor2);

//结构->节点->访问者