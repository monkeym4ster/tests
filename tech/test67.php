<?php

//$s = 'helo';
//$arr = [5, 0];
//
//var_dump(array_search($s, $arr));
//var_dump(in_array($s, $arr));

//$str = '13688311696,22';
//var_dump((int)$str == $str);
//var_dump($str == (int)$str);
//echo $str."\n";
echo memory_get_usage() . "\n";
$a = [5, 9, 1, 2, 3, 4, 6, 7, 8, 10];
$b = 1;
$c = 2;

$key1 = array_search($b, $a) && $key2 = array_search($c, $a);
echo $key1 . ' ' . $key2 . "\n";
//输出:1 3

$key2 = 0;
$key1 = array_search($b, $a) && $key2 = array_search($c, $a);
echo $key1 . ' ' . $key2 . "\n";
//输出:1 3

($key1 = array_search($b, $a)) && $key2 = array_search($c, $a);
echo $key1 . ' ' . $key2 . "\n";
//输出:2 3
echo memory_get_usage() . "\n";