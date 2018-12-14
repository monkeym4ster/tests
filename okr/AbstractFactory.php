<?php
/**
 * 抽象工厂(AbstractFactory):
 * 抽象工厂模式可以向客户端提供一个接口，使客户端在不必指定产品的具体的情况下，创建多个产品族中的产品对象。
 *
 * 抽象工厂模式的定义：为创建一组相关或相互依赖的对象提供一个接口，而且无需指定它们的具体类。
 * 工厂方法模式的定义：为某个对象提供一个接口，而且无需指定它们的具体类。
 * 抽象工厂模式的工厂能创建多个相关的产品对象，而工厂方法模式的工厂只创建一个产品对象。
 *
 * 1.它分离了具体的类
 * 2.它使得易于交换产品系列
 * 3.它有利于产品的一致性
 *
 * 产品族本身的扩展非常困难。
 */

abstract class AbstractFactory
{
    abstract function get($name);
}

interface Phone
{
    public function sayHello();
}

class Iphone implements Phone
{
    function sayHello()
    {
        echo 'Hello Iphone ' . "\n";
    }
}

class Android implements Phone
{
    function sayHello()
    {
        echo 'Hello Android ' . "\n";
    }
}

class Factory extends AbstractFactory
{
    function get($name)
    {
        if (class_exists($name)) {
            return new $name();
        }
        return null;
    }
}

$factory = new Factory();
$iphoneFactory = $factory->get('Iphone');
$iphoneFactory->sayHello();
