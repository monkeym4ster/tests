<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/9/14
 * Time: 下午4:42
 */

class System
{
}

class Soft
{
}

class MacSystem extends System
{
}

class MacSoft extends Soft
{
}

class LinuxSystem extends System
{
}

class LinuxSoft extends Soft
{
}


interface AbstractFactory
{
    public function createSystem();

    public function createSoft();
}

class MacFactory implements AbstractFactory
{
    public function createSystem()
    {
        return new MacSystem();
    }

    public function createSoft()
    {
        return new MacSoft();
    }
}

class LinuxFactory implements AbstractFactory
{
    public function createSystem()
    {
        // TODO: Implement createSystem() method.
        return new LinuxSystem();
    }

    public function createSoft()
    {
        // TODO: Implement createSoft() method.
        return new LinuxSoft();
    }

}

$macFactoryObj = new MacFactory();
$macSoft = $macFactoryObj->createSoft();
$macSystem = $macFactoryObj->createSystem();

$linuxFactoryObj = new LinuxFactory();
$linuxSoft = $linuxFactoryObj->createSoft();
$linuxSystem = $linuxFactoryObj->createSystem();