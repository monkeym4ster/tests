<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/5/28
 * Time: 下午8:10
 */

require_once 'CreateRemindByBizRequest.php';
require_once 'ProtocolToolV2.php';

$req = new CreateRemindByBizRequest();

$type = array('ZD300', 'SC100', 'SC100', 'SC200', 'SC300');
//$req->setRemindEventNo($type[2]);

$req->setBizId('70000023820604');
$req->setBizType('133');
$req->setRemindEventNo(['SC200']);
$remindReceiver =
    [
        'SC200' => [
//                    'phoneNumber' => [
//                        ['phone' => '18608018029', 'mobileAreaCode' => '86']
//                    ],
//                    'emailAddress' => [
//                        ['email' => 'zhoufeng@xiaozhu . com  17710336571'],
//                    ],
            'XZUserId' => [
                'users' => ['9670202863'],
                'validity' => [
                    'type' => 'fixedtime',
                    'param' => 86400
                ],
                'dealaction' => [
                    'type' => 'jumplook',
                    'param' => 'landlordmallorder_detail'
                ],
            ],
            'deviceNumber' => [
//                  'byDevice' => ['70000001370504'],//暂时只支持根据用户id来发送
                'byUser' => ['70000001207205', '70000023703205'],
            ]
        ],
    ];
$req->setReplaceText([
    '#checkinday#' => '2017-10-09',
    '#checkoutday#' => '2017-10-10',
]);
$req->setRemindReceiver($remindReceiver);

$protocolTool = new ProtocolToolV2();

$ret = $protocolTool->createRemindByBiz($req);

print_r($ret);