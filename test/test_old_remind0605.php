<?php

ini_set('display_errors', 'Off');
require_once dirname(__FILE__) . "/inc/assembly.php";
$userId = 9670202863;
$orderId = 70000000023600;
$subOrderId = 70000000023601;
//select * from sellorder where submiterid=9670202863;
//select * from sellorder where id=70000000023600;
//select * from sellsuborder where id=70000000023601;


function testFinish($userId, $subOrderId)
{
//    update sellorder set currentstate = 'posted',laststate = 'pay' where id = 70000000023600;
//    update sellsuborder set currentstate = 'posted',laststate = 'pay' where id = 70000000023601;
    $user = DaoImp::getEntityDaoImp('User')->getById($userId);
    UnitOfWork::getInstance()->start();
    $entity = DaoImp::getEntityDaoImp('LandlordMallSellSubOrder')->getById($subOrderId);

    $sellSubOrderState = $entity->getSellSubOrderState();

    $subOrderFlow = new LandlordMallSellSubOrderFlow($entity, $user);
    $result = $subOrderFlow->switchSubOrderState(LandlordMallSellOrderStateEnum::FINISH, '', 'android');
    UnitOfWork::getInstance()->commit();
    UnitOfWork::getInstance()->stop();
    var_dump($result);
}

function testTimeout($userId, $orderId)
{
//update sellorder set currentstate='wait',laststate='' where id=70000000023600;
//update sellsuborder set currentstate='wait',laststate='' where id=70000000023601;
    $user = DaoImp::getEntityDaoImp('User')->getById($userId);
    UnitOfWork::getInstance()->start();
    $entity = DaoImp::getEntityDaoImp('LandlordMallSellOrder')->getById($orderId);

    $subOrderFlow = new LandlordMallSellOrderFlow($entity, $user);
    $result = $subOrderFlow->switchOrderState(LandlordMallSellOrderStateEnum::TIMEOUT, '', 'android');
    UnitOfWork::getInstance()->commit();
    UnitOfWork::getInstance()->stop();
    var_dump($result);
}

function testCancel($userId, $subOrderId)
{
//    update sellorder set currentstate = 'pay',laststate = 'wait' where id = 70000000023600;
//    update sellsuborder set currentstate = 'pay',laststate = 'wait' where id = 70000000023601;
    $user = DaoImp::getEntityDaoImp('User')->getById($userId);
    UnitOfWork::getInstance()->start();
    $entity = DaoImp::getEntityDaoImp('LandlordMallSellSubOrder')->getById($subOrderId);

    $subOrderFlow = new LandlordMallSellSubOrderFlow($entity, $user);
    $result = $subOrderFlow->switchSubOrderState(LandlordMallSellOrderStateEnum::CANCEL, '', 'android');
    UnitOfWork::getInstance()->commit();
    UnitOfWork::getInstance()->stop();
    var_dump($result);
}

function testPosted($userId, $subOrderId)
{
//    update sellorder set currentstate = 'pay',laststate = 'wait' where id = 70000000023600;
//    update sellsuborder set currentstate = 'pay',laststate = 'wait' where id = 70000000023601;
    $user = DaoImp::getEntityDaoImp('User')->getById($userId);
    UnitOfWork::getInstance()->start();
    $entity = DaoImp::getEntityDaoImp('LandlordMallSellSubOrder')->getById($subOrderId);

    $subOrderFlow = new LandlordMallSellSubOrderFlow($entity, $user);
    $result = $subOrderFlow->switchSubOrderState(LandlordMallSellOrderStateEnum::POSTED, '', 'android');
    UnitOfWork::getInstance()->commit();
    UnitOfWork::getInstance()->stop();
    var_dump($result);
}

testTimeout($userId, $orderId);
