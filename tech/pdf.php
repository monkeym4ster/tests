<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 18-2-28
 * Time: 下午3:18
 */

$str = file_get_contents('1.pdf');
trim($str);
$str = str_replace('""', '无', $str);
$str = str_replace('"', ' ', $str);
$str = str_replace('{', ' ', $str);
$str = str_replace('}', ' ', $str);
$str = str_replace('[', ' ', $str);
$str = str_replace(']', ' ', $str);
$str = str_replace('\'', ' ', $str);
$str = str_replace('\'', ' ', $str);
$str = str_replace(':', ' ', $str);
$str = str_replace('\\', ' ', $str);
$str = str_replace('|', ' ', $str);
$str = str_replace(',', ' ', $str);

$data = explode(' ', $str);
$data2 = array();
foreach ($data as $datum) {
    if (!$datum == '') {
        $data2[] = $datum;
    }
}
$data3 = array();
foreach ($data2 as $key => $item) {
    if ($key % 2 == 0) {
        $data3[$item] = $data2[$key + 1];
    }
}
print_r($data3);
exit;