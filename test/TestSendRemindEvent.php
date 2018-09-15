<?php

require 'CreateRemindByBizRequest.php';
require 'ProtocolTool.php';

class TestSendRemindEvent
{
    public static $remindEventId;
    //引入interlayyer
    //修改自动加载类
    //照葫芦画瓢
    public function testSendZD300()
    {
        $sendData = $this->joinDataZD300();
        $req = new ProtocolTool();
        $ret = $req->createRemindByBiz($sendData);
        print_r($ret);
    }

    public function testSendSC100()
    {
        $sendData = $this->joinDataSC100();
        $req = new ProtocolTool();
        $ret = $req->createRemindByBiz($sendData);
        print_r($ret);
    }

    public function testSendSC200()
    {
        $sendData = $this->joinDataSC200();
        $req = new ProtocolTool();
        $ret = $req->createRemindByBiz($sendData);

    }

    public function testSendSC300()
    {
        $sendData = $this->joinDataSC300();
        $req = new ProtocolTool();
        $ret = $req->createRemindByBiz($sendData);
        print_r($ret);
    }

    public function testSendSC400()
    {
        $sendData = $this->joinDataSC400();
        $req = new ProtocolTool();
        $ret = $req->createRemindByBiz($sendData);
        print_r($ret);
    }


    private function joinDataZD300()
    {
        $req = new CreateRemindByBizRequest();
        $req->setBizId('70000023788804');
        $req->setBizType('12');
        $req->setRemindEventNo(['ZD300']);
        $remindReceiver =
            [
                'ZD300' => [
                    'phoneNumber' => [
                        ['phone' => '18608018029', 'mobileAreaCode' => '86']
                    ],
                    'emailAddress' => [
                        ['email' => 'zhoufeng@xiaozhu.com'],
                    ],
                    'XZUserId' => [
                        'users' => ['70000001207205'],
                        'validity' => [
                            'type' => 'fixedtime',
                            'param' => 86400
                        ],
                        'dealaction' => [
                            'type' => 'jumplook',
                            'param' => 'fangke_orderdetail'
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

        return $req;

    }

    private function joinDataSC100()
    {
        $req = new CreateRemindByBizRequest();
        $req->setBizId('70000023820604');
        $req->setBizType('133');
        $req->setRemindEventNo(['SC100']);
        $remindReceiver =
            [
                'SC100' => [
//                    'phoneNumber' => [
//                        ['phone' => '18608018029', 'mobileAreaCode' => '86']
//                    ],
//                    'emailAddress' => [
//                        ['email' => 'zhoufeng@xiaozhu.com  17710336571'],
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

        return $req;

    }

    private function joinDataSC200()
    {
        $req = new CreateRemindByBizRequest();
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
//                        ['email' => 'zhoufeng@xiaozhu.com  17710336571'],
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

        return $req;

    }

    private function joinDataSC300()
    {
        $req = new CreateRemindByBizRequest();
        $req->setBizId('70000023820604');
        $req->setBizType('133');
        $req->setRemindEventNo(['SC300']);
        $remindReceiver =
            [
                'SC300' => [
//                    'phoneNumber' => [
//                        ['phone' => '18608018029', 'mobileAreaCode' => '86']
//                    ],
//                    'emailAddress' => [
//                        ['email' => 'zhoufeng@xiaozhu.com  17710336571'],
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

        return $req;

    }

    private function joinDataSC400()
    {
        $req = new CreateRemindByBizRequest();
        $req->setBizId('70000023820604');
        $req->setBizType('133');
        $req->setRemindEventNo(['SC400']);
        $remindReceiver =
            [
                'SC400' => [
//                    'phoneNumber' => [
//                        ['phone' => '18608018029', 'mobileAreaCode' => '86']
//                    ],
//                    'emailAddress' => [
//                        ['email' => 'zhoufeng@xiaozhu.com  17710336571'],
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

        return $req;

    }
}