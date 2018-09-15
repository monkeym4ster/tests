<?php

abstract class SingletonAbstractFactory
{
    protected static $instances;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        $className = self::getClassName();
        if (empty(self::$instances[$className])) {
            self::$instances[$className] = new $className;
        }
        return self::$instances[$className];
    }

    public static function removeInstance()
    {
        $className = self::getClassName();
        if (self::$instances[$className]) {
            unset(self::$instances[$className]);
        }
    }

    final protected static function getClassName()
    {
        return get_called_class();
    }

    final protected function __clone()
    {
    }
}

abstract class Factory extends SingletonAbstractFactory
{
    final public static function getInstance()
    {
        return parent::getInstance();
    }

    final public static function removeInstance()
    {
        parent::removeInstance();
    }
}

class FirstProduct extends Factory
{
    public $a = [];
}

class SecondProduct extends FirstProduct
{

}

$first = FirstProduct::getInstance();
$second = SecondProduct::getInstance();
var_dump($first, $second);