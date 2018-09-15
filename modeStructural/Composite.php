<?php
/**
 * 合成模式,聚合管理
 */

interface Component
{
    public function getComposite();

    public function operation();
}

class Composite implements Component
{
    protected $_composites;

    public function __construct()
    {
        $this->_composites = array();
    }

    public function getComposite()
    {
        return $this;
    }

    public function operation()
    {
        foreach ($this->_composites as $composite) {
            $composite->operation();
        }
    }

    public function add(Component $component)
    {
        $this->_composites[] = $component;
    }

    public function remove(Component $component)
    {
        if ($key = array_search($component, $this->_composites)) {
            unset($this->_composites[$key]);
            return true;
        }
        return false;
    }

    public function getChildren()
    {
        return $this->_composites;
    }
}

class Leaf implements Component
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getComposite()
    {
        return null;
    }

    public function operation()
    {
        echo $this->_name . "\n";
    }
}

$leaf1 = new Leaf('first');
$leaf2 = new Leaf('second');

$composite = new Composite();
$composite->add($leaf1);
$composite->add($leaf1);
$composite->add($leaf2);
$composite->operation();