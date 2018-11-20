<?php

$a = [
//    ['title' => '', 'subTitle' => '', 'imgUrl' => 'https://image.xiaozhustatic1.com/00,900,450/15,0,67,31060,900,450,a43a84e0.jpg', 'jumpUrl' => 'https://s.growingio.com/oAPV7L'],
    ['title' => '', 'subTitle' => '', 'imgUrl' => 'https://image.xiaozhustatic1.com/00,900,450/14,0,20,7746,900,450,ca485c01.jpg', 'jumpUrl' => 'https://m.xiaozhu.com/act/act_countrymeisu/index.html'],
    ['title' => '', 'subTitle' => '', 'imgUrl' => 'https://image.xiaozhustatic3.com/00,900,450/13,0,80,30882,900,450,908f656f.jpg', 'jumpUrl' => 'https://m.xiaozhu.com/act/act_oversealus2018/index.html'],
];

$o = [
    ['title' => '商旅认证', 'subTitle' => '免押入住，发票包邮', 'jumpUrl' => 'https://m.xiaozhu.com/yunying/busiuseridentifypage.html'],
    ['title' => '芝麻信用', 'subTitle' => '累积信用，居住自由', 'jumpUrl' => 'https://m.xiaozhu.com/yunying/zhimaspecialtopic.html?needUserLogin=1'],
    ['title' => '蚂蚁花呗', 'subTitle' => '先住后付，分期还款', 'jumpUrl' => 'https://m.xiaozhu.com/yunying/antchecklater.html'],
    ['title' => '小猪保险', 'subTitle' => '房客房东，免费保险', 'jumpUrl' => 'https://m.xiaozhu.com/yunying/insurancetopic.html'],
];


$i = [
    1 => 'https://image.xiaozhustatic1.com/00,900,900/15,0,42,31549,900,900,96a8a235.jpg',
    2 => 'https://image2.xiaozhustatic1.com/00,900,900/15,0,86,12711,900,900,88f96cd6.jpg',
    3 => 'https://image2.xiaozhustatic1.com/00,750,750/15,0,48,12734,750,750,1095da26.jpg',
];

$l = [
    ['title' => '京都', 'subTitle' => 'KYOTO', 'cityId' => 1196, 'timeZone' => '+09:00', 'isAbroad' => true, 'lodgeUnitIds' => '9279756164,10348440260,23881364303,25430320703,29861168503'],
    ['title' => '广州', 'subTitle' => 'GUANGZHOU', 'cityId' => 16, 'timeZone' => '+08:00', 'isAbroad' => false, 'lodgeUnitIds' => '14866706203,16573672501,16825418903,11256820559,9188355064'],
    ['title' => '清迈', 'subTitle' => 'CHIANGMAI', 'cityId' => 2154, 'timeZone' => '+07:00', 'isAbroad' => true, 'lodgeUnitIds' => '10431060960,22929884403,21645559703,10809498560,10117955760'],
    ['title' => '北京', 'subTitle' => 'BEIJING', 'cityId' => 12, 'timeZone' => '+08:00', 'isAbroad' => false, 'lodgeUnitIds' => '5312757514,3195706334,9230016964,4285501414,10235737260'],
    ['title' => '上海', 'subTitle' => 'SHANGHAI', 'cityId' => 13, 'timeZone' => '+08:00', 'isAbroad' => false, 'lodgeUnitIds' => '13835651402,1046673478,19139293603,3575695930,5749203913'],
    ['title' => '成都', 'subTitle' => 'CHENGDU', 'cityId' => 45, 'timeZone' => '+08:00', 'isAbroad' => false, 'lodgeUnitIds' => '12769177602,16645673303,14512946003,8571871664,7480419715'],
    ['title' => '西安', 'subTitle' => 'XIAN', 'cityId' => 176, 'timeZone' => '+08:00', 'isAbroad' => false, 'lodgeUnitIds' => '15431507403,14671998603,20130755503,25437439103,25951109601'],
    ['title' => '青岛', 'subTitle' => 'QINGDAO', 'cityId' => 114, 'timeZone' => '+08:00', 'isAbroad' => false, 'lodgeUnitIds' => '11489069360,4987188114,6051447616,9698407964,9055264463'],
];

$preKey = 'homeIndex4Subpackage_';
$firstImgKey = $preKey . 'firstImg';
$operationKey = $preKey . 'operation';
$activityKey = $preKey . 'activity';
$lodgeUnitKey = $preKey . 'lodgeUnit';
$lodgeUnitKeyV2 = $preKey . 'lodgeUnitV2';
$datas = [
    $firstImgKey => $i,
    $operationKey => $o,
    $activityKey => $a,
    $lodgeUnitKey => $l
];
$result = [];


$file = fopen(time() . ".sql", 'w');
foreach ($datas as $key => $data) {
    $sql = "insert into xzweb.uniquekeyvalue set uname='" . $key . "',uvalue='" . json_encode($data, JSON_UNESCAPED_UNICODE) . "' ON DUPLICATE KEY UPDATE uvalue='" . json_encode($data, JSON_UNESCAPED_UNICODE) . "';";
    fwrite($file, $sql . "\n");
}
fclose($file);

