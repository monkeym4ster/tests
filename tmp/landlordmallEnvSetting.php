<?php

class EnvSetting
{
    public static $topLevelDomain ='dev-xzcallback-03.xiaozhu.com';
    public static $domain ='dev-xzcallback-03.xiaozhu.com';
    public static $cookieDomain ='.xiaozhu.com';
    public static $XZRakeDomain = "dingpa.xiaozhu.com";
    public static $xzRakeDomainV2 = "dev-xzcallback-03.xzrake.xiaozhu.com";
    public static $XZRakeCleanDomain = "baojierake.xiaozhu.com";
    public static $wapDomain = 'wap.xiaozhu.com';
    public static $xzCmsDomain = 'xzcms.xiaozhu.com';
    public static $domain4SearchUrlWriter ='dev-xzcallback-03.xiaozhu.com';
    public static $greatWallDomain = "greatwall.xiaozhu.com";
    public static $imServerDomain = "imserver.xiaozhu.com:8081";
    public static $imServerChatDomain = "imserverchat.xiaozhu.com:8081";
    public static $imServerChatDomainWeb = "imserverchat.xiaozhu.com";
    public static $socialCallbackDomain = "xzcallback.xiaozhu.com";

    public static $XZRakeUrlPrefix ='https://';
    public static $DingPaUrlPrefix ='https://';
    public static $CleanerDingPaUrlPrefix ='http://';
    public static $mobileDomain ='dev-xzcallback-06.xiaozhu.com';
    public static $html5Domain ='dev-m-06.xiaozhu.com';
    public static $xzH5Domain = "dev-xzh5-07.xiaozhu.com";
    public static $mobileApiKey= "xiao_!@&^~&*_zhu_121210";
    public static $androidMobileVersion= "1.0.4";
    public static $androidMobileClientDownloadUrl = 'https://m.xiaozhu.com/app/xzdz_201611003.apk';
    public static $androidMobileClientDownloadUrl_FD = 'http://m.xiaozhu.com/app.php';
    public static $androidMobileClientDownloadUrl_FK = 'http://m.xiaozhu.com/app.php';
    public static $androidMobileClientDownloadUrl_FD_APK = 'https://m.xiaozhu.com/app/xzdz_201611001.apk';
    public static $androidMobileClientDownloadUrl_FK_APK = 'https://m.xiaozhu.com/app/xzdz_201611002.apk';
    public static $androidMobileForceUpgrade = false;
    public static $iosMobileVersion= "1.4";
    public static $iosMobileForceUpgrade = false;
    public static $iosMobileClientDownloadUrl = 'https://itunes.apple.com/us/app/xiao-zhu-guan-jia/id783372931?mt=8';
    public static $iosMobileClientDownloadUrl_FD = 'https://itunes.apple.com/us/app/xiao-zhu-guan-jia/id783372931?mt=8';
    public static $iosMobileClientDownloadUrl_FK = 'https://itunes.apple.com/cn/app/xiao-zhu-duan-zu-wang/id952710115?l=zh&ls=1&mt=8';

    public static $machineRoomHaveWritePermission = true;
    public static $bookOrderAbnormalAlarm = true;

    public static $staticDomain = array(
        1 => "dev-xzcallback-03.xiaozhu.com",
        1 => "dev-xzcallback-03.xiaozhu.com",
        1 => "dev-xzcallback-03.xiaozhu.com",
    );
    public static $pageElementsDir = "/e18022601";
    public static $ver_dingpa = "v_20171019";

    public static $useBaiduPoi = true;
    public static $webimV4ServerUrl = 'https://imserver.xiaozhu.com:8081';
    public static $versionCacheEnable = true;
    public static $sessionDomain = "xiaozhu.com";
    public static $versionCacheStorePath = "/home/users/zhoufeng/project/landlordmall/tmp/";
    public static $smartyTemplateDir = WEB_TEMPLATE_DIR;
    public static $smartyTemplateDir_XZRake = RAKE_TEMPLATE_DIR;
    public static $smartyTemplateDir_XZRake4H5 = XZRAKE_TEMPLATE_DIR;
    public static $smartyTemplateH5Dir = H5WEB_TEMPLATE_DIR; 
    public static $smartyTemplateDir_XZRakeCleaner = XZRAKEClEANER_TEMPLATE_DIR;
    public static $searchPageMapPathName = "map";

    // smarty 输出结果去除空白符
    public static $smartyOutputStrip = false;
    public static $smartyOutputStripReturnReplaceString = "____RETURN____";
    public static $tmpDir = "/home/users/zhoufeng/project/landlordmall/tmp/";

    public static $alipayPartnerId = '2088801442628454';
    public static $alipaySecureKey = 'wio4oldxnbny7ibzsv5ax1hn182sap9u';
    public static $alipayEmail = 'bjxiaozhu@xiaozhu.com';
    public static $alipayAccountName= '北京快跑信息科技有限公司';

    public static $tenpayKey = '123456789xiaozhukuaipao123456789';
    public static $tenpayPartner = '1214130901';

    public static $WEIXIN_PARTNER = '1223743701';
    public static $WEIXIN_PARTNER_KEY = '410f61748efdb09781330df35e2e6db9';
    public static $WEIXIN_APP_ID = 'wxea5b413296e9ae45';
    public static $WEIXIN_APP_SECRET= 'e9a918b75c3d86ecf9f19c4e44ebfde4';  
    public static $WEIXIN_APP_KEY='hn8xj28pI8BAKerj7y0IiJOMBD5JRj9kHPsKkSCdaJDqlCphrca1uGSx6sDkl03gMEOdm0EZAqfetBwNdPCqFHoMonQDqr9dD0Fi5zdwMK56Q9UM96LKiacat9r14UIf';
    public static $mobileAlipayPartner = '2088101568358171';
    public static $mobileAlipayKey = 'uxt01uurwxvstkxpmleeok76ezicp8k4';
    public static $mobileAlipayEmail = 'alipay-test09@alipay.com';

    public static $forcardPartnerId = '2088211335943320';
    public static $forcardSecureKey = '3z425szov2zxjnm287voeejnwqgslnbt';
    public static $forcardSellerLogonId = 'hwxiaozhu@xiaozhu.com';

    public static $payPalMode = '';
    public static $payPalClientId = array(
        'live' => 'ATXWRLMVoeoNS2i1jwW4ujEybRxezosclNgZZRm4QCZd1NGZxSZf7SMKsVvrBzpoq8PMxar4AiSWRDUV',
        'sandbox' => 'AWLxP7sJyeMQJIx-OrBzN9XGMTKFs_BCZosDpQWdbkbmGgfNE9ztOdzhg7Vb3QDzxrBHmNt-oYxPj23H'
    );
    public static $payPalSecret = array(
        'live' => 'EFaPYZ0Qp0USzrUNlkbqmhWDE67ld8WZJWFn6PXi3XwUsirbaPtFK0m3S2hL49gvgx8xwds9UgXT1ijK',
        'sandbox' => 'EDRYCNDYpTu84tA1Kd7928xxdSihygUn3ckbNXr2hgsSbZXdev-xzcallback-03.0eczuFFstPjIOP9auHEOCdx6sD4n7o'
    );
        
    public static $agodaApiMode = 'live';
    public static $agodaApi = array(
        'live' => array(
            'search' => "http://affiliateapi7643.agoda.com/xmlpartner/",
            'book' => "https://affiliateapisecure.agoda.com/xmlpartner/",
            'email' => "http://affiliateapiservices.agoda.com/api/v1/gethostcontact",
        ),
        'sandbox' => array(
            'search' => "http://sandbox-affiliateapi.agoda.com/xmlpartner/",
            'book' => "https://sandbox-affiliateapi.agoda.com/xmlpartner/",
            'email' => "http://sg-affsbx-6b01:8877/api/v1/gethostcontact",
        ),
    );

    public static $img2Domain ='http://image2.xiaozhustatic1.com';
    public static $taobaoImg2Domain ='http://taobao.xiaozhustatic.com';
    public static $imgDomains = array
    (
        0 => 'https://image.xiaozhustatic1.com',    
        1 => 'https://image.xiaozhustatic2.com',    
        2 => 'https://image.xiaozhustatic3.com',    
    );
    public static $uploadImageUrl = "http://image2.xiaozhustatic1.com/imgins.php";
    public static $uploadImageUrlNew = "http://image2.xiaozhustatic2.com/imgin4uploadify.php";
    public static $imageRotateUrl = "http://image2.xiaozhustatic2.com/imgRotateIns.php";
    public static $homePageWidth = 1600;
    public static $homePageHeight = 700;
    public static $homePageH5Width = 675;
    public static $homePageH5Height = 500;

    public static $intranetDomain = array(
        'base' => 'dev-xzweb-32.xiaozhu.com',
        'trigger' => 'dev-xzcallback-06.xiaozhu.com',
        'landlordMall' => '',
        'duCoin' => 'dev-xzcallback-04.xiaozhu.com',
    );

    public static $roomDefaultImgUrl = '/images/home-big.jpg';
    public static $userDefaultImgUrl = '/images/man.png';
    public static $womenDefaultImgUrl = '/images/women.png';
    public static $menDefaultImgUrl = '/images/man.png';
    public static $defaultImgUrl = '/images/uchome.gif';
    public static $unAssignCleanerImgUrl = '/images/unAssignCleanerImg.png';
    public static $defaultCleanerWomanImgUrl = '/images/defaultCleanerWoman.png';
    public static $defaultCleanerManImgUrl = '/images/defaultCleanerMan.png';

    public static $showPagesOfMyPageLink = 5;
    public static $showPagesOfMyPageLink4XZRake = 10;
    public static $lowerlimitImageCntWhenPublish = 5;

    public static $isDebug = true;
    public static $isInTestcase = false;
    public static $isSendSms = false;
    public static $isXZRakeSendEmailToAM = false;
    public static $isPushEngine = false;
    public static $isPushAudit = false;
    public static $isEditPrice = false;
    public static $webImTrigger = false;
    public static $piwikTrigger = false;
    public static $smsSendByYimeiTrigger = false;
    public static $smsSendByManDaoTrigger = false;
    public static $smsSendByManDaoV2Trigger = true;
    public static $smsSendByEXinTongTrigger = false;
    public static $orderSMSObserve = false;
    public static $orderNotificationReCall = false;
    public static $exceptionRedirectTrigger = false;
    public static $notifyTerminalLogTrigger = false;
    public static $cashPledgeOnLineTrigger = false;
    public static $isUseActiviti = false;
    public static $calendarCodeValidate = true;


    public static $tmpUploadDir = "/home/users/zhoufeng/project/landlordmall/tmp/";
    public static $scriptDir = SCRIPT_DIR;
    public static $realeasePath = WEB_DOCUMENT_ROOT;

    public static $sysMessage = 1000000;
    public static $rakeSysAdmin = 1000;

    public static $imageMinHeight = 800;
    public static $lowerWHRateOfImage = 1.0;
    public static $upperWHRateOfImage = 1.6;
    public static $lowerHWRateOfImage = 1.0;
    public static $upperHWRateOfImage = 1.6;
    public static $isRakeResetPwd = true;
    public static $rakeResetPwdMinDate = '2013-11-15';

    public static $mapKey = "7f53a64ae4b1272d4d70127ae7447bd2aa88da1adb52a04294fe04f6dd71eaba809b9b74dc58c814";

    public static $roomInfoSize = 621; 
    public static $TopicsPath   = TOPICS_DIR;

    public static $quartzServers = array(
            "lvl1" => array(
                "quartzdev.xiaozhu.com:8080",
                "quartzdev.xiaozhu.com:8081",
                "quartzdev.xiaozhu.com:8080",
                "quartzdev.xiaozhu.com:8081",
                ),
            "lvl2" => array(
                "quartzdev.xiaozhu.com:8080",
                "quartzdev.xiaozhu.com:8081",
                "quartzdev.xiaozhu.com:8080",
                "quartzdev.xiaozhu.com:8081",
                ),
            "lvl3" => array(
                "quartzdev.xiaozhu.com:8080",
                "quartzdev.xiaozhu.com:8081",
                "quartzdev.xiaozhu.com:8080",
                "quartzdev.xiaozhu.com:8081",
                ),
            ); 

    public static $imServerNoticeUrl = "http://icomethelper.xiaozhu.com/webim/publishimannouncement.srv";
    public static $imServerNoticeUrl4App = "http://xmppclient.xiaozhu.com:8090/webim/publishappannouncement.srv";
    public static $headImg = "http://image.xiaozhustatic2.com/21/0,0,38,2948,145,145,0491d6a9.jpg";
    public static $apnsDevicePushService = array(
        'apns_xiaozhu'  => array('host' => '127.0.0.1', 'listen'=> '0.0.0.0', 'port' => '8963', 'workers' => 4, 'tasks' => 16),
        'apns_minsu'    => array('host' => '127.0.0.1', 'listen'=> '0.0.0.0', 'port' => '8962', 'workers' => 4, 'tasks' => 16),
        'apns_meisu'    => array('host' => '127.0.0.1', 'listen'=> '0.0.0.0', 'port' => '8961', 'workers' => 4, 'tasks' => 16),
        'apns_duanzu'   => array('host' => '127.0.0.1', 'listen'=> '0.0.0.0', 'port' => '8960', 'workers' => 4, 'tasks' => 16),
        'xiaomipush'    => array('host' => '127.0.0.1', 'listen'=> '0.0.0.0', 'port' => '8959', 'workers' => 4, 'tasks' => 16),
        'huaweipush'    => array('host' => '127.0.0.1', 'listen'=> '0.0.0.0', 'port' => '8958', 'workers' => 4, 'tasks' => 16),
        //'apns_xiaozhu2' => array('host' => '192.168.1.111', 'listen'=> '0.0.0.0', 'port' => '8961', 'workers' => 2, 'tasks' => 4),
        //'apns_tianwen'  => array('host' => '192.168.1.111', 'listen'=> '0.0.0.0', 'port' => '8960', 'workers' => 2, 'tasks' => 4),
    );
    public static $apnsDevicePushInfo = array(
        'xiaozhu' => array(
            'production' => array(
                'feedback' => array(
                    'server' => 'feedback.push.apple.com:2196',
                    'certificate' => 'apns_production_xiaozhu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.push.apple.com:2195',
                    'certificate' => 'apns_production_xiaozhu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
            'development' => array(
                'feedback' => array(
                    'server' => 'feedback.sandbox.push.apple.com:2196',
                    'certificate' => 'apns_development_xiaozhu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.sandbox.push.apple.com:2195',
                    'certificate' => 'apns_development_xiaozhu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
        ),
        'minsu' => array(
            'production' => array(
                'feedback' => array(
                    'server' => 'feedback.push.apple.com:2196',
                    'certificate' => 'apns_production_minsu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.push.apple.com:2195',
                    'certificate' => 'apns_production_minsu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
            'development' => array(
                'feedback' => array(
                    'server' => 'feedback.sandbox.push.apple.com:2196',
                    'certificate' => 'apns_development_minsu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.sandbox.push.apple.com:2195',
                    'certificate' => 'apns_development_minsu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
        ),
        'meisu' => array(
            'production' => array(
                'feedback' => array(
                    'server' => 'feedback.push.apple.com:2196',
                    'certificate' => 'apns_production_meisu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.push.apple.com:2195',
                    'certificate' => 'apns_production_meisu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
            'development' => array(
                'feedback' => array(
                    'server' => 'feedback.sandbox.push.apple.com:2196',
                    'certificate' => 'apns_development_meisu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.sandbox.push.apple.com:2195',
                    'certificate' => 'apns_development_meisu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
        ),
        'duanzu' => array(
            'production' => array(
                'feedback' => array(
                    'server' => 'feedback.push.apple.com:2196',
                    'certificate' => 'apns_production_duanzu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.push.apple.com:2195',
                    'certificate' => 'apns_production_duanzu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
            'development' => array(
                'feedback' => array(
                    'server' => 'feedback.sandbox.push.apple.com:2196',
                    'certificate' => 'apns_development_duanzu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.sandbox.push.apple.com:2195',
                    'certificate' => 'apns_development_duanzu.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
        ),
        'xiaozhu2' => array(
            'production' => array(
                'feedback' => array(
                    'server' => 'feedback.push.apple.com:2196',
                    'certificate' => 'apns_production_xiaozhu2.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.push.apple.com:2195',
                    'certificate' => 'apns_production_xiaozhu2.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
            'development' => array(
                'feedback' => array(
                    'server' => 'feedback.sandbox.push.apple.com:2196',
                    'certificate' => 'apns_development_xiaozhu2.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.sandbox.push.apple.com:2195',
                    'certificate' => 'apns_development_xiaozhu2.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
        ),
        'tianwen' => array(
            'production' => array(
                'feedback' => array(
                    'server' => 'feedback.push.apple.com:2196',
                    'certificate' => 'apns_production_tianwen.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.push.apple.com:2195',
                    'certificate' => 'apns_production_tianwen.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
            'development' => array(
                'feedback' => array(
                    'server' => 'feedback.sandbox.push.apple.com:2196',
                    'certificate' => 'apns_development_tianwen.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
                'gateway' => array(
                    'server' => 'gateway.sandbox.push.apple.com:2195',
                    'certificate' => 'apns_development_tianwen.pem',
                    'passphrase' => 'xiaozhu2012',
                ),
            ),
        ),
    );
    public static $apnsPushConfig = array(
        'development' => array(
            'server' => 'gateway.sandbox.push.apple.com:2195',
            'certificate' => 'apns_development.pem',
            'passphrase' => 'xiaozhu2012',
        ),
        'production' => array(
            'server' => 'gateway.push.apple.com:2195',
            'certificate' => 'apns_production.pem',
            'passphrase' => 'xiaozhu2012',
        ),
    );
    public static $fkApnsPushConfig_minsu = array(
        'development' => array(
            'server' => 'gateway.sandbox.push.apple.com:2195',
            'certificate' => 'apns_minsu_development.pem',
            'passphrase' => 'xiaozhu2012',
        ),
        'feedback' => array(
            'server' => 'feedback.push.apple.com:2196',
            'certificate' => 'apns_minsu_production.pem',
            'passphrase' => 'xiaozhu2012',
        ),
        'production' => array(
            'server' => 'gateway.push.apple.com:2195',
            'certificate' => 'apns_minsu_production.pem',
            'passphrase' => 'xiaozhu2012',
        ),
    );
    public static $fkApnsPushConfig = array(
        'development' => array(
            'server' => 'gateway.sandbox.push.apple.com:2195',
            'certificate' => 'fk_apns_development.pem',
            'passphrase' => 'xiaozhu2012',
        ),
        'feedback' => array(
            'server' => 'feedback.push.apple.com:2196',
            'certificate' => 'fk_apns_production.pem',
            'passphrase' => 'xiaozhu2012',
        ),
        'production' => array(
            'server' => 'gateway.push.apple.com:2195',
            'certificate' => 'fk_apns_production.pem',
            'passphrase' => 'xiaozhu2012',
        ),
    );
    public static $apnsFeedBackconfig = array(
        'development' => array(
            'server' => 'feedback.sandbox.push.apple.com:2196',
            'certificate' => 'apns_development.pem',
            'passphrase' => '12345qwert',
        ),
        'production' => array(
            'server' => 'feedback.push.apple.com:2196',
            'certificate' => 'apns_production.pem',
            'passphrase' => '12345qwert',
        ),
    );

    public static $workFlowUrl_activiti = "http://activiti.xiaozhu.com:8083";

    /*
    public static $huoHeLockProviderApi = "http://b.huohetech.com/op";
    public static $dingDingLockProviderApi = "https://lockapi.dding.net";
    public static $dingDingAccount = "e8486eff97c6a7f7929242ad";
    public static $dingDingPassword = "0c7d018f5f16eb4fb5357651a585f079";
    public static $huoHeAccount = "rest_xz";
    public static $huoHePassword = "kdf6hw3e0op";
    public static $guoJiaLockProviderApi = "http://ops.huohe.xiaozhu.com";
    public static $guoJiaAccount = "xiaozhu_ops";
    public static $guoJiaPassword = "xzdztest123";
    public static $guoJiaDesEncryKey = '23xYosdf';
    //生产环境,正式账号
    public static $juShuLockProviderApi = "http://api.zelkova.cn/index.php";
    public static $juShuAccount = "1005895900";
    public static $juShuPassword = '!@#$%^';
    public static $juShuSignKey = '(xz%~`&)ZEL6%$';
    */

    public static $usePubSysAddressCounter = false;

    public static $wechatConfig = array(
        'gh_a00f91351803' => array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx4cb4a75966d92288',
            'secret'  =>  'f6707acb7e8b8b59307da6b10409c711',
            'account' =>  'gh_a00f91351803',
            'type'    =>'weixin'
            ),
        'gh_47d0e130a467' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx26e4612c18471872',
            'secret'  =>  '5c2fbc367481b51dcb167b10807f6406',
            'account' =>  'gh_47d0e130a467',
            'type'    =>'weixindy'
            ),
        'gh_1fef1054bcff' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx310b355cfe702839',
            'secret'  =>  '7cd4d92faf9642a7e90a5e508d6a1cfb',
            'account' =>  'gh_1fef1054bcff',
            'type'    =>'weixinsl'
            ),
        'gh_119cea3d14c4' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wxbbf745fba99d22fe',
            'secret'  =>  'ac4ec781ca56b3ce7a83cf42f5f3f939',
            'account' =>  'gh_119cea3d14c4',
            'type'    =>'weixincleaner'
        ),
        'gh_ae7ca4a5a7b7' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx75046600471f5917',
            'secret'  =>  'd4624c36b6795d1d99dcf0547af5443d',
            'account' =>  'gh_ae7ca4a5a7b7',
            'type'    =>  'test'
            ),  
        'test' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx75046600471f5917',
            'secret'  =>  'd4624c36b6795d1d99dcf0547af5443d',
            'account' =>  'gh_ae7ca4a5a7b7'
            ),
        'weixindy' => array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx26e4612c18471872',
            'secret'  =>  '5c2fbc367481b51dcb167b10807f6406',
            'account' =>  'gh_47d0e130a467'
            ),
        'weixin' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx4cb4a75966d92288',
            'secret'  =>  'f6707acb7e8b8b59307da6b10409c711',
            'account' =>  'gh_a00f91351803'
            ),
         'weixinsl' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wx310b355cfe702839',
            'secret'  =>  '7cd4d92faf9642a7e90a5e508d6a1cfb',
            'account' =>  'gh_1fef1054bcff'
            ),
        'weixinopen' => array(
            'token'   =>  '',
            'appid' => 'wx38a6e13880fbabb3',
            'secret' => 'fbbaa06393a689644be707db110e3284',
            'account' => 'weixinopen',
            'type' => 'weixinopen'
        ),
        'weixincleaner' =>  array(
            'token'   =>  '1F9jFvw0Y2',
            'appid'   =>  'wxbbf745fba99d22fe',
            'secret'  =>  'ac4ec781ca56b3ce7a83cf42f5f3f939',
            'account' =>  'gh_119cea3d14c4',
            'type'   => 'weixincleaner'
        ),
    );
    public static function setSmartyTemplateDir($dir)
    {
        self::$smartyTemplateDir = $dir;
    }

    public static function getICometAddr_Pub()
    {
        return "http://imserver.xiaozhu.com:8080";
    }
}
?>
