<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/8/12
 * Time: 下午3:24
 */

interface People
{
    public function run();
}

class Man implements People
{
    public function run()
    {
        echo 'Man Run' . "\n";
    }
}

class Woman implements People
{
    public function run()
    {
        echo 'WoMan Run' . "\n";
    }
}


class Factory
{
    public static function create($className)
    {
        return new $className;
    }
}

Factory::create('Woman')->run();
//DaoImp->getEntityDaoImp()