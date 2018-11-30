<?php

$arr1 = [1, 2, 3, 4, 5, 6, 7, 8];
$arr2 = [1, 2, 3, 4, 5, 6, 7, 8];
//$arr2 = [1, 3, 4, 8, 10];
$arr3 = [];
$expireTime = date('Y-m-d 23:59:59', strtotime('+7 days'));
$date = date('Y-m-d H:i:s', strtotime('-7 days'));
$res = array_diff($arr1, $arr2);
//shuffle($res);
var_dump($res, $expireTime);