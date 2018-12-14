<?php

/**
 * 备忘录模式:在不破坏封装性的前提下,捕获一个对象内部状态,并在该对象之外保存这个状态.
 * Memento负责储存Originator对象内部状态,并防止Originator之外的对象访问Memento.
 * Originator负责创建一个Memento,记录当前时刻内部状态,并可使用Memento回复至当前状态.
 * Caretaker负责保存Memento.不能对Memento进行操作或者检查.
 *
 * 把要保存的细节给封装在Memento中,细节的改变即不会影响客户端的改变了
 * 适用于功能比较复杂,又需要维护和记录历史属性的类,或者需要保存的属性只是众多属性中的一小部分时.
 *
 * 命令模式撤销功能时,可以使用备忘录模式储存可撤销操作的状态.
 * 可以把复杂对象内部信息对其他的对象屏蔽开来.
 * 角色状态改变时,如果状态无效,即可使用此模式进行复原.
 */

class Originator
{
    private $_state;

    public function getState()
    {
        return $this->_state;
    }

    public function setState($state)
    {
        $this->_state = $state;
    }

    public function show()
    {
        echo "State: " . $this->_state . "\n";
    }

    public function createMemento()
    {
        $memento = new Memento($this->_state);
        return $memento;
    }
}

class Memento
{
    private $_state;

    function __construct($state)
    {
        $this->_state = $state;
    }

    public function getState()
    {
        return $this->_state;
    }
}

class Caretaker
{
    private $_memento;

    function __construct(Memento $memento)
    {
        $this->_memento = $memento;
    }

    public function getMemento()
    {
        return $this->_memento;
    }

    public function setMemento($memento)
    {
        $this->_memento = $memento;
    }
}

$originator = new Originator();
$originator->setState('hello');
$originator->show();

$caretaker = new Caretaker($originator->createMemento());
$memento = $caretaker->getMemento();
