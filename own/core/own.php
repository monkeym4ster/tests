<?php

namespace core;

class Own
{
    public static $classMap = array();

    public static function run()
    {
        echo 'Hello' . "\n";
        $route = new namespace\Own();
    }

    static function load($class)
    {
        if (isset($classMap[$class])) {
            return true;
        }
        str_replace('\\', '/', $class);
        if (is_file(CORE . $class . '.php')) {
            include CORE . $class . '.php';
            self::$classMap[$class] = $class;
        } else {
            throw new \ErrorException('No class');
        }
    }
}