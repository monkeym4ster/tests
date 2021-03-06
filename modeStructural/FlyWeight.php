<?php
/**
 * 运用共享技术有效的支持大量细粒度的对象
 * 享元模式变化的是对象的存储开销
 * 享元模式中主要角色：
 * 抽象享元（Flyweight）角色：此角色是所有的具体享元类的超类，为这些类规定出需要实现的公共接口。那些需要外运状态的操作可以通过调用商业以参数形式传入
 * 具体享元（ConcreteFlyweight）角色：实现Flyweight接口，并为内部状态（如果有的话）拉回存储空间。ConcreteFlyweight对象必须是可共享的。它所存储的状态必须是内部的
 * 不共享的具体享元（UnsharedConcreteFlyweight）角色：并非所有的Flyweight子类都需要被共享。Flyweight使共享成为可能，但它并不强制共享
 * 享元工厂(FlyweightFactory)角色：负责创建和管理享元角色。本角色必须保证享元对象可能被系统适当地共享
 * 客户端(Client)角色：本角色需要维护一个对所有享元对象的引用。本角色需要自行存储所有享元对象的外部状态
 * 享元模式的优点：
 * Flyweight模式可以大幅度地降低内存中对象的数量
 * 享元模式的缺点：
 * Flyweight模式使得系统更加复杂
 * Flyweight模式将享元对象的状态外部化，而读取外部状态使得运行时间稍微变长
 * 享元模式适用场景：
 * 当一下情况成立时使用Flyweight模式：
 * 1 一个应用程序使用了大量的对象
 * 2 完全由于使用大量的对象，造成很大的存储开销
 * 3 对象的大多数状态都可变为外部状态
 * 4 如果删除对象的外部状态，那么可以用相对较少的共享对象取代很多组对象
 * 5 应用程序不依赖于对象标识
 */

abstract class Resources
{
    public $resource = null;

    abstract public function operate();
}

class UnShareFlyWeight extends Resources
{
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function operate()
    {
        echo $this->resource . "\n";
    }
}

class ShareFlyWeight extends Resources
{
    private $_resources = [];

    public function getResource($resource)
    {
        if (isset($this->_resources[$resource])) {
            return $this->_resources[$resource];
        } else {
            return $this->_resources[$resource] = $resource;
        }
    }

    public function operate()
    {
        foreach ($this->_resources as $key => $resource) {
            echo $key . ':' . $resource . "\n";
        }
    }
}

$flyWeight = new ShareFlyWeight();
$flyWeight->getResource('a');
$flyWeight->operate();
$flyWeight->getResource('b');
$flyWeight->operate();
$flyWeight->getResource('c');
$flyWeight->operate();

$unFlyWeight = new UnShareFlyWeight('a');
$unFlyWeight->operate();
$unFlyWeight = new UnShareFlyWeight('b');
$unFlyWeight->operate();