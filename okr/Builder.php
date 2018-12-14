<?php
/**
 * 建造者模式(Builder):依赖倒转,抽象不依赖于细节,细节应该依赖于抽象
 * 将一个复杂对象的构建与它的表示分离,使得构建过程可以创建不同的表示.指定对象而无需知道其内部实现.
 *
 * 产品创建过程于产品本身解耦,相同创建过程可以创建不同对象.
 * 具体建造这之间相互独立,使用不同的具体建造者即可得到不同的对象.
 * 更加严格的控制产品的创建过程
 * 易于扩展,新增具体建造者时无需更改原类代码.
 *
 * 产品间差异大和内部变化复杂(变化复杂,具体建造者实现,系统庞大)时不宜使用此模式
 *
 * 四个角色:
 * Product,
 * Builder,
 * ConcreteBuilder,
 * Director:隔离产品与对象的生产过程,自己负责控制对象的生产过程
 */
class Person
{
    protected $_head;
    protected $_body;
    protected $_arm;
    protected $_leg;

    public function getHead()
    {
        return $this->_head;
    }

    public function setHead($head)
    {
        $this->_head = $head;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function setBody($body)
    {
        $this->_body = $body;
    }

    public function getArm()
    {
        return $this->_arm;
    }

    public function setArm($arm)
    {
        $this->_arm = $arm;
    }

    public function getLeg()
    {
        return $this->_leg;
    }

    public function setLeg($leg)
    {
        $this->_leg = $leg;
    }
}

abstract class PersonBuilder
{
    protected $_person;

    function __construct(Person $person)
    {
        $this->_person = $person;
    }

    abstract function buildHead();

    abstract function buildBody();

    abstract function buildArm();

    abstract function buildLeg();

    function getPerSon()
    {
        return $this->_person;
    }
}

class PersonThinBuilder extends PersonBuilder
{
    function buildHead()
    {
        $this->_person->setHead('tiny head');
    }

    function buildBody()
    {
        $this->_person->setBody('tiny body');
    }

    function buildArm()
    {
        $this->_person->setArm('tiny arm');
    }

    function buildLeg()
    {
        $this->_person->setLeg('tiny leg');
    }
}

class PersonFatBuilder extends PersonBuilder
{
    function buildHead()
    {
        $this->_person->setHead('tiny head');
    }

    function buildBody()
    {
        $this->_person->setBody('tiny body');
    }

    function buildArm()
    {
        $this->_person->setArm('tiny arm');
    }

    function buildLeg()
    {
        $this->_person->setLeg('tiny leg');
    }
}


class PersonDirector
{
    protected $_personBuilder;

    public function __construct(PersonBuilder $personBuilder)
    {
        $this->_personBuilder = $personBuilder;
    }

    public function createPerson()
    {
        $this->_personBuilder->buildHead();
        $this->_personBuilder->buildArm();
        $this->_personBuilder->buildBody();
        $this->_personBuilder->buildLeg();
        return $this->_personBuilder->getPerSon();
    }
}

$person = new Person();
$fatPersonBuilder = new PersonFatBuilder($person);
$fatPersonDirector = new PersonDirector($fatPersonBuilder);
$person = $fatPersonDirector->createPerson();
var_dump($person);
