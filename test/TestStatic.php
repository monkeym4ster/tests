<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/7/3
 * Time: 下午7:05
 */

class TestStatic
{
    public static function test1($num)
    {
        echo $num;
    }

    public function test2()
    {
        echo 2;
    }
}

for ($i = 0; $i < 3; $i++) {
    TestStatic::test1($i);
}