<?php

require_once dirname(__FILE__) . '../inc/assembly.php';

//userId    70000023518505
//orderId   70000024141804
//subOrderId    70000024141805
//addressId     70000024141704
$userId = 70000023518505;
$userAddressId = 70000024141704;

$user = DaoImp::getEntityDaoImp('User')->getById('70000023518505');
$userId = $user->getId();
$userAddress = OtherInfo::getAddress($userId, $userAddressId);

$address = $userAddress['provinceName'] . $userAddress['cityName'] . $userAddress['districtName'] . $userAddress['address'];
$type = SellOrderTypeEnum::LANDLORDMALL;
$orderType = OrderTypeEnum::NORMAL;
$assembleMarkId = '';
$submiter = $user;
$receiver = $userAddress['receiver'];
$postMobile = $userAddress['postMobile'];
$operId = $user->getId();
$operFrom = 'android';
$remark = '';
$sellOrderEntity = LandlordMallSellOrder::createBiz($type, $assembleMarkId, $submiter, $orderType, $receiver, $postMobile, $address, $operId, $operFrom, $remark);

//$timeoutAction = new LandlordMallSellOrderWait2TimeoutObserverAction();
//$finishAction = new LandlordMallSellSubOrderFinishObserverAction();
$cancelAction = new LandlordMallSellSubOrderWaitPostRejectObserverAction();
//$postAction = new LandlordMallSellSubOrderPostedObserverAction();
$result = $cancelAction->doAction($sellOrderEntity);
print_r(json_decode($result, true));
exit;
