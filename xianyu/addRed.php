<?php

$s = '{"activity":"70000052009201","startdate":1533484800,"enddate":1538323199,"max":40000000}';
$activityId = 70000052009201;
$data = array(
    'activity' => $activityId,
    'startdate' => strtotime(date('2018-09-03 00:00:00')),
    'enddate' => strtotime(date('2018-09-30 23:59:59')),
    'max' => 40000000,
);
$data = json_encode($data);

$sql = printf("INSERT INTO xzweb.uniquekeyvalue SET uname='%s' , uvalue='%s' ON DUPLICATE KEY UPDATE uvalue='%s'", 'xianYuDiscountActivityOfGeneralRedPackageCode', $data, $data);
echo $sql."\n";

