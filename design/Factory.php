<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/8/1
 * Time: 下午4:11
 */

namespace design;
class Factory
{
    public static function getCollector($collector)
    {
        echo $collector;
    }
}