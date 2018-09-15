<?php
set_time_limit(3600 * 24);
require_once(dirname(__FILE__) . "/inc/assembly.php");
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);

$tags = array(
    '5' => array('title' => '特价', 'desc' => '限时促销进行中，预订享折扣', 'filter' => 'yes', 'order' => 1, 'url' => '/app/appResources/label_v2_promotion.png', 'color' => '#ff4081', 'alpha' => '1'),
    '10' => array('title' => '优品', 'desc' => '设施齐全、服务贴心、体验优质', 'filter' => 'yes', 'order' => 2, 'url' => '/app/appResources/label_v2_youPin.png', 'color' => '#ff4081', 'alpha' => '1'),
    '21' => array('title' => '中文房东', 'desc' => '全中文服务，沟通无障碍', 'filter' => 'yes', 'order' => null, 'url' => '/app/appResources/label_v2_zhongwenlandlord.png', 'color' => '#ff4081', 'alpha' => '1'),
    '16' => array('title' => '私家别墅', 'desc' => '独享私密空间，配套多功能娱乐设备', 'filter' => 'yes', 'order' => 11, 'url' => '/app/appResources/label_v2_siJiaBieShu.png', 'color' => '#ff4081', 'alpha' => '1'),
    '17' => array('title' => '海景豪宅', 'desc' => '精品装修的高品质住宅，看海吹风听浪', 'filter' => 'yes', 'order' => 12, 'url' => '/app/appResources/label_v2_haiJingHaoZhai.png', 'color' => '#ff4081', 'alpha' => '1'),
    '11' => array('title' => '商旅认证', 'desc' => '随时入住、交通便利、适合办公', 'filter' => 'yes', 'order' => 9, 'url' => '/app/appResources/label_v2_shangLvRenZheng.png', 'color' => '#ff4081', 'alpha' => '1'),
    '13' => array('title' => '乡村美宿', 'desc' => '房源别具特色、周边景色秀丽', 'filter' => 'yes', 'order' => 10, 'url' => '/app/appResources/label_v2_xiangCunMeiSu.png', 'color' => '#ff4081', 'alpha' => '1'),
    '6' => array('title' => '超棒新房', 'desc' => '设施好、服务优的新上线房源', 'filter' => 'yes', 'order' => 8, 'url' => '/app/appResources/label_v2_qualityNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '15' => array('title' => '花呗免息', 'desc' => '预订日期在15天之内，分期免息', 'filter' => 'yes', 'order' => 14, 'url' => '/app/appResources/label_v2_huabei.png', 'color' => '#ff4081', 'alpha' => '1'),
    '7' => array('title' => '长租优惠', 'desc' => '周租月租有折扣，长期入住更实惠', 'filter' => 'yes', 'order' => 7, 'url' => '/app/appResources/label_v2_daysDiscount.png', 'color' => '#26a69a', 'alpha' => '1'),
    '14' => array('title' => '先住后付', 'desc' => '订单无需预付，退房自动扣除', 'filter' => 'yes', 'order' => 5, 'url' => '/app/appResources/label_v2_xianZhuHouFuNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '3' => array('title' => '免押金', 'desc' => '小猪在线担保、无需支付押金', 'filter' => 'yes', 'order' => 13, 'url' => '/app/appResources/label_v2_cashPledgeFree.png', 'color' => '#26a69a', 'alpha' => '1'),
    '8' => array('title' => '速订', 'desc' => '下单流程更短、房东确认更快', 'filter' => 'yes', 'order' => null, 'url' => '/app/appResources/label_v2_isFirstpay.png', 'color' => '#26a69a', 'alpha' => '1'),
    '2' => array('title' => '验真', 'desc' => '小猪实地考察，确保房源真实性', 'filter' => 'yes', 'order' => 16, 'url' => '/app/appResources/label_v2_yanZhen.png', 'color' => '#26a69a', 'alpha' => '1'),
    '1' => array('title' => '实拍', 'desc' => '摄影师上门拍摄，100%还原房源', 'filter' => 'yes', 'order' => 15, 'url' => '/app/appResources/label_v2_shiPai.png', 'color' => '#26a69a', 'alpha' => '1'),
    '9' => array('title' => '验真/实拍', 'desc' => '小猪实地考察，摄影师上门拍摄', 'filter' => 'yes', 'order' => null, 'url' => '/app/appResources/label_v2_shiPai.png', 'color' => '#26a69a', 'alpha' => '1'),
    '4' => array('title' => '智能门锁', 'desc' => '自助入住和退房，无需等待房东', 'filter' => 'yes', 'order' => 17, 'url' => '/app/appResources/label_v2_isDoorlock.png', 'color' => '#26a69a', 'alpha' => '1'),
    '18' => array('title' => '可购取消险', 'desc' => '可购买取消险，行程变化有保障', 'filter' => 'yes', 'order' => 6, 'url' => '/app/appResources/label_v2_carefree2xNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '19' => array('title' => '速订', 'desc' => '下单即可入住，无需房东确认', 'filter' => 'yes', 'order' => 4, 'url' => '/app/appResources/label_v2_isFirstpayNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '22' => array('title' => '紧邻地铁', 'desc' => '房源周边300m内有地铁站', 'filter' => 'no', 'order' => 18, 'url' => '/app/appResources/label_v2_isNearMetro.png', 'color' => '#26a69a', 'alpha' => '1'),
    '23' => array('title' => '购物便利', 'desc' => '房源周边500m内有商超', 'filter' => 'no', 'order' => 19, 'url' => '/app/appResources/label_v2_isShoppingConvenient.png', 'color' => '#26a69a', 'alpha' => '1'),
);

$tagddds = array(
    '5' => array('title' => '特价', 'desc' => '限时促销进行中，预订享折扣', 'filter' => 'yes', 'order' => 1, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_promotion.png', 'color' => '#ff4081', 'alpha' => '1'),
    '10' => array('title' => '优品', 'desc' => '设施齐全、服务贴心、体验优质', 'filter' => 'yes', 'order' => 2, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_youPin.png', 'color' => '#ff4081', 'alpha' => '1'),
    '21' => array('title' => '中文房东', 'desc' => '全中文服务，沟通无障碍', 'filter' => 'yes', 'order' => null, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_zhongwenlandlord.png', 'color' => '#ff4081', 'alpha' => '1'),
    '16' => array('title' => '私家别墅', 'desc' => '独享私密空间，配套多功能娱乐设备', 'filter' => 'yes', 'order' => 11, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_siJiaBieShu.png', 'color' => '#ff4081', 'alpha' => '1'),
    '17' => array('title' => '海景豪宅', 'desc' => '精品装修的高品质住宅，看海吹风听浪', 'filter' => 'yes', 'order' => 12, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_haiJingHaoZhai.png', 'color' => '#ff4081', 'alpha' => '1'),
    '11' => array('title' => '商旅认证', 'desc' => '随时入住、交通便利、适合办公', 'filter' => 'yes', 'order' => 9, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_shangLvRenZheng.png', 'color' => '#ff4081', 'alpha' => '1'),
    '13' => array('title' => '乡村美宿', 'desc' => '房源别具特色、周边景色秀丽', 'filter' => 'yes', 'order' => 10, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_xiangCunMeiSu.png', 'color' => '#ff4081', 'alpha' => '1'),
    '6' => array('title' => '超棒新房', 'desc' => '设施好、服务优的新上线房源', 'filter' => 'yes', 'order' => 8, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_qualityNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '15' => array('title' => '花呗免息', 'desc' => '预订日期在15天之内，分期免息', 'filter' => 'yes', 'order' => 14, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_huabei.png', 'color' => '#ff4081', 'alpha' => '1'),
    '7' => array('title' => '长租优惠', 'desc' => '周租月租有折扣，长期入住更实惠', 'filter' => 'yes', 'order' => 7, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_daysDiscount.png', 'color' => '#26a69a', 'alpha' => '1'),
    '14' => array('title' => '先住后付', 'desc' => '订单无需预付，退房自动扣除', 'filter' => 'yes', 'order' => 5, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_xianZhuHouFuNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '3' => array('title' => '免押金', 'desc' => '小猪在线担保、无需支付押金', 'filter' => 'yes', 'order' => 13, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_cashPledgeFree.png', 'color' => '#26a69a', 'alpha' => '1'),
    '8' => array('title' => '速订', 'desc' => '下单流程更短、房东确认更快', 'filter' => 'yes', 'order' => null, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_isFirstpay.png', 'color' => '#26a69a', 'alpha' => '1'),
    '2' => array('title' => '验真', 'desc' => '小猪实地考察，确保房源真实性', 'filter' => 'yes', 'order' => 16, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_yanZhen.png', 'color' => '#26a69a', 'alpha' => '1'),
    '1' => array('title' => '实拍', 'desc' => '摄影师上门拍摄，100%还原房源', 'filter' => 'yes', 'order' => 15, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_shiPai.png', 'color' => '#26a69a', 'alpha' => '1'),
    '9' => array('title' => '验真/实拍', 'desc' => '小猪实地考察，摄影师上门拍摄', 'filter' => 'yes', 'order' => null, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_shiPai.png', 'color' => '#26a69a', 'alpha' => '1'),
    '4' => array('title' => '智能门锁', 'desc' => '自助入住和退房，无需等待房东', 'filter' => 'yes', 'order' => 17, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_isDoorlock.png', 'color' => '#26a69a', 'alpha' => '1'),
    '18' => array('title' => '可购取消险', 'desc' => '可购买取消险，行程变化有保障', 'filter' => 'yes', 'order' => 6, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_carefree2xNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '19' => array('title' => '速订', 'desc' => '下单即可入住，无需房东确认', 'filter' => 'yes', 'order' => 4, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_isFirstpayNew.png', 'color' => '#ff4081', 'alpha' => '1'),
    '22' => array('title' => '紧邻地铁', 'desc' => '房源周边300m内有地铁站', 'filter' => 'no', 'order' => 18, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_isNearMetro.png', 'color' => '#ff4081', 'alpha' => '1'),
    '23' => array('title' => '购物便利', 'desc' => '房源周边500m内有商超', 'filter' => 'no', 'order' => 19, 'url' => 'https://m.xiaozhu.com/app/appResources/label_v2_isShoppingConvenient.png', 'color' => '#ff4081', 'alpha' => '1'),
);

$order = array();
foreach ($tags as $key => $tag) {
    $order[] = $tag['order'];
}
array_multisort($order, SORT_ASC);

$position = ['show', 'filtermore'];
$file = fopen(time() . ".sql", 'w');
foreach ($tags as $key => $data) {
    $id = 233;
    foreach ($position as $pos) {
        $sql = "replace into xzweb.lodgeunitlabelconfig set
 id=" . $id . ",ver=1,estate='valid',position='" . $pos . "'";
    }
    fwrite($file, $str . "\n");
}
fclose($file);

//$filterTags = [1, 2, 3, 4, 18, 22];
//$resTags = array();
//foreach ($filterTags as $filterTag) {
//    $resTags[$filterTag] = $filterTag;
//}
//
//$result = array_intersect_key($tags, $resTags);
//print_r($result);