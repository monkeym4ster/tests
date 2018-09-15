<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/7/3
 * Time: 下午1:02
 */

$arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arr2 = [3, 2, 1, 4, 9, 7, 8, 6, 5, 10];
$arr3 = [4, 5, 6];

//$arr_res = array_count_values($arr1);
$arr = array_intersect_key($arr3, $arr2);
var_dump($arr);