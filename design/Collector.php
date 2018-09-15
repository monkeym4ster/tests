<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/8/1
 * Time: 下午4:11
 */

namespace design;

class Collector
{
    public function doAction($name)
    {
        Factory::getCollector($name);
    }
}
