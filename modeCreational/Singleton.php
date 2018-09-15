<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/9/14
 * Time: 下午4:06
 */

class Singleton
{
    private static $instance;

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$a = Singleton::getInstance();
$b = Singleton::getInstance();
var_dump($a, $b);