<?php

$arr = [1 => 2, 2 => 3, 3 => 4, 4 => 5];
$arr2 = [1 => 1, 3 => 3, 4 => 4, 5 => 5, 7 => 7];
$arr4 = [1, 3, 4];
$arr3 = [18600 => 'a', 52500 => 'b', 'c'];

$res = array_intersect_key($arr, $arr4);
print_r($res);