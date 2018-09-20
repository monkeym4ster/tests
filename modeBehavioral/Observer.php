<?php
/**
 * 某个对象可以被设置为是可观察的，只要通过某种方式允许其他对象注册为观察者。
 * 每当被观察的对象改变时，会发送信息给观察者。
 */

interface IObserver
{
    function onSendMessage($sender, $message);

    function getName();
}

interface IObservable
{
    function addObserver($observer);
}

class UserList implements IObservable
{
    private $_observers = array();

    function addObserver($observer)
    {
        $this->_observers[] = $observer;
    }

    public function removeObserver($observer)
    {
        $observerKey = array_search($observer, $this->_observers);
        if (!empty($observerKey)) unset($this->_observers[$observerKey]);
    }

    public function sendMessage($message)
    {
        foreach ($this->_observers as $observer) {
            $observer->onSendMessage($this, $message);
        }
    }
}

class UserListLogger implements IObserver
{
    function onSendMessage($sender, $message)
    {
        // TODO: Implement onSendMessage() method.
        echo "on send $message \n";
    }

    function getName()
    {
        // TODO: Implement getName() method.
        return 'UserListLogger';
    }
}

class OtherObserver implements IObserver
{
    function onSendMessage($sender, $message)
    {
        // TODO: Implement onSendMessage() method.
        echo "send other $message\n";
    }

    function getName()
    {
        // TODO: Implement getName() method.
        return 'OtherObserver';
    }
}

$ul = new UserList();
$otherObserver = new OtherObserver();
$ul->addObserver(new UserListLogger());
$ul->addObserver($otherObserver);
$ul->sendMessage('hello');

$ul->removeObserver($otherObserver);
$ul->sendMessage('world');