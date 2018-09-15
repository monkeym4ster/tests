<?php
/*
 * 添加新的红包列表,适用用红包数量较大的
 */
require_once(dirname(__FILE__) . "/../../inc/assembly.php");
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);

if (empty((int)$argv[1]) || empty((int)$argv[2])) {
    echo '参数不足';
    exit;
}
$createrid = $argv[1];
$total = $argv[2];

$activityValue = array(
    "createrid" => $createrid, //decimal(30,0) NOT NULL
    "cooperation" => '闲鱼', //合作者,varchar(256) NOT NULL
    "name" => '闲鱼开发测试券', //活动名称,varchar(20) NOT NULL
//    "name" => '闲鱼用户专享券', //活动名称,varchar(20) NOT NULL
    "desc" => '闲鱼开发测试券' //活动描述,varchar(255) NOT NULL
//    "desc" => '闲鱼用户专享券' //活动描述,varchar(255) NOT NULL
);
$redPackageValue = array(
    "facevalue" => 400,//红包金额,单位:元
    "convertrate" => 100,//使用比例
    "convertstartdate" => Util::Today(),//红包兑换起始日期
    "convertenddate" => '2018-10-31',//红包兑换截止日期
    "accountstartdate" => Util::Now(),//使用开始时间
    "accountenddate" => '2018-10-31 23:59:59',//使用截止时间
    "createrid" => $createrid //decimal(30,0) NOT NULL
);

//根据活动名检查活动是否存在,不存在则报错
$activity = DaoImp::getEntityDaoImp('Activity')->countActivityByName($activityValue['name']);
if (kempty($activity)) {
    echo "activity not exist";
    exit;
} else {
    $activityId = $activity['id'];
}

UnitOfWork::start();
for ($i = 0; $i < $total; $i++) {
    $convertvalue = '';
    $redpackage = RedPackage::createBiz(
        $redPackageValue['facevalue'],
        $redPackageValue['convertstartdate'],
        $redPackageValue['convertenddate'],
        $activityId,
        $redPackageValue['accountstartdate'],
        $redPackageValue['accountenddate'],
        $redPackageValue['createrid'],
        RedPackageEnum::WAIT,
        $convertvalue,
        $redPackageValue['convertrate']
    );
}
UnitOfWork::getInstance()->commit();
UnitOfWork::stop();
?>
