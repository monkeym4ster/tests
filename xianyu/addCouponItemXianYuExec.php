<?php
require_once dirname(__FILE__) . "/../../inc/assembly.php";
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);
/*
 * 根据活动名名称创建couponItem
 */

if (empty((int)$argv[2])) {
    echo '参数不足';
    exit;
}
$offset = !empty($argv[1]) ? intval($argv[1]) : 0;
$limit = $argv[2];

UnitOfWork::getInstance()->start();
$activityName = "闲鱼开发测试券";
//$activityName = "闲鱼用户专享券";
$activity = DaoImp::getEntityDaoImp('Activity')->countActivityByName($activityName);
if (kempty($activity)) {
    echo 'activity not exist';
    exit;
}
$couponInfo = json_decode($activity['couponinfo'], true);
if (kempty($couponInfo)) {
    echo 'couponinfo not exist';
    exit;
}

$redPackages = DaoImp::getEntityDaoImp('RedPackage')->getUserRedPackageByActivity($activity['id'], $offset, $limit);

if (kempty($redPackages)) {
    echo 'redPackage not exist';
    exit;
}

foreach ($redPackages as $redPackage) {
    $redPackage = DaoImp::getEntityDaoImp('RedPackage')->getById($redPackage['id']);
    if (kempty($redPackage)) continue;
    foreach ($couponInfo as $item) {
        $couponRule = DaoImp::getEntityDaoImp("CouponRule")->getById($item['couponId']);
        if (kempty($couponRule)) {
            continue;
        }
        $type = $couponRule->getType();
        $faceValue = $item['amount'];
        $amount = $item['amount'];
        $convertRate = $couponRule->getConvertRate();
        $useStartTime = '2018-08-08';
        $expireTime = '2018-10-31';
        $couponNum = isset($item['couponNum']) ? (int)$item['couponNum'] : 0;   //一个红包码兑换同一类型的优惠券数量
        if ($couponNum <= 0) continue;
        for ($i = 0; $i < $couponNum; $i++) {
            $couponItem = CouponItem::createBiz($redPackage, $couponRule, $type, $faceValue, $amount, $convertRate, $useStartTime, $expireTime);
        }
    }
}

UnitOfWork::getInstance()->commit();
UnitOfWork::getInstance()->stop();
?>
