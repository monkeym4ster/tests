<?php


set_time_limit(3600 * 24);
require_once(dirname(__FILE__) . "/inc/assembly.php");
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);

$luid = 3198717745;
$lodgeUnit = DaoImp::getEntityDaoImp('LodgeUnit')->getById($luid);
$lodgeUnitExtraattribute = new LodgeunitExtraattribute();
$luExtraEntity = $lodgeUnitExtraattribute->findOne(array('luid' => $lodgeUnit->getId()));

$tags = array();
$sql = "select b.labelindex as tag from lodgeunitlabel a inner join lodgeunitlabelconfig b on (a.labelconfigid=b.id) inner join labelposition c on (a.labelconfigid=c.labelid) where a.luid=? and a.state=? and (b.`starttime` < NOW() or b.starttime is null) and (b.endtime>now() or b.endtime is null) and b.estate=? and c.position=? and (c.weight<>0 or c.weight is not null)";
$vals = array($luid, LodgeStateEnum::ONLINE, EstateEnum::VALID, LodgeUnitLabelConfig::SHOW);
$rows = COMapping::getObject("ExStorageHandler", null, "s")->queryRows($sql, $vals);
if (!kempty($rows)) {
    foreach ($rows as $row) {
        $tags[] = $row['tag'];
    }
}
$tags = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 22, 23, 100, 101];
$keyTags = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 22, 23];
$keyTagMap = array();
foreach ($keyTags as $tag) {
    $keyTagMap[$tag] = $tag;
}

$result = array();
foreach ($tags as $key => $tag) {
    $checkResult = false;
    if (isset($keyTagMap[$tag])) {
        switch ($tag) {
            case LodgeUnitTagsFilterEnum::LU_SHIPAI:
                if ($luExtraEntity->bdcheckedphoto > 0) $checkResult = true;
                break;
            case LodgeUnitTagsFilterEnum::LU_YANZHEN:
                if ($luExtraEntity->bdcheckedreal > 0) $checkResult = true;
                break;
            case LodgeUnitTagsFilterEnum::LU_YANZHENSHIPAI:
                if ($luExtraEntity->bdcheckedreal > 0 || $luExtraEntity->bdcheckedphoto > 0) {
                    $checkResult = true;
                }
                break;
            case LodgeUnitTagsFilterEnum::LU_CASHPLEDGEFREE:
                if ($lodgeUnit->getCashPledgeFree() == ExistEnum::YES || kempty($lodgeUnit->getCashPledge())) {
                    $checkResult = true;
                }
                break;
            case LodgeUnitTagsFilterEnum::LU_DOORLOCK:
                if (EntityClassEnum::valueOfByEntity($lodgeUnit) == EntityClassEnum::LODGEUNIT && !kempty($lodgeUnit->getLock())) $checkResult = true;
                break;
            case LodgeUnitTagsFilterEnum::LU_TEJIA:
                $promotionPolicy = new PromotionPolicy();
                $daysdiscountObj = $promotionPolicy->getWeekMonthDiscountByLuid($lodgeUnit->getId());
                $policy = $promotionPolicy->getValidPolicyInfo($lodgeUnit->getId(), '', '');
                if (kempty($daysdiscountObj) && !kempty($policy)) {
                    $perdayRemainNights = $policy->perdayremainnights;
                    $validRemainNights = 0;
                    if (!kempty($perdayRemainNights) && !kempty(json_decode($perdayRemainNights)) && is_object(json_decode($perdayRemainNights))) {
                        $today = date('Y-m-d');
                        foreach (json_decode($perdayRemainNights) as $key => $item) {
                            if ($key < $today) continue;
                            $startDate = $key;
                            $endDate = date('Y-m-d', strtotime('+1 day', strtotime($key)));
                            $canBook = LodgeUnitBookAble::getPeriodBookAble($lodgeUnit, $startDate, $endDate);
                            if (!$canBook) continue;
                            $validRemainNights += $item;
                        }
                    }
                    if (!kempty($validRemainNights)) {
                        $promotionTime = json_decode($policy->competency->conditions, true) ?: '';
                        $ymdhis = date('Y-m-d H:i:s');
                        if (!kempty($promotionTime) && $ymdhis > $promotionTime['bookstarttime'] && $ymdhis < $promotionTime['bookendtime']) {
                            $checkResult = true;
                        }
                    }
                }
                break;
            case LodgeUnitTagsFilterEnum::LU_CHAOBANG:
                $qualityNewObj = DaoImp::getEntityDaoImp('XZRakeLodgeUnit4QualityNew')->getByLuIdAndState($lodgeUnit->getId(), XZRakeLodgeUnit4QualityNewEnum::EFFECT, XZRakeLodgeUnit4QualityNewTypeEnum::QUALITYNEW);
                if (!kempty($qualityNewObj)) {
                    $checkResult = true;
                }
                break;
            case LodgeUnitTagsFilterEnum::LU_WEEKMONTH:
                if (!kempty($daysdiscountObj)) $checkResult = true;
                break;
            case LodgeUnitTagsFilterEnum::TMP_DOUBLEELEVEN:
                if (DoubleElevenZhimaList::isInList($lodgeUnit->getId())) $checkResult = true;
                break;
            case LodgeUnitTagsFilterEnum::LU_YOUPIN:
                $qualityNewObj = DaoImp::getEntityDaoImp('XZRakeLodgeUnit4QualityNew')->getByLuIdAndState($lodgeUnit->getId(), XZRakeLodgeUnit4QualityNewEnum::EFFECT, XZRakeLodgeUnit4QualityNewTypeEnum::SUPERIOR);
                if (!kempty($qualityNewObj)) {
                    $checkResult = true;
                }
                break;
            case LodgeUnitTagsFilterEnum::LU_3D:
                $res = DaoImp::getEntityDaoImp('LodgeUnit3dUrl')->getUrlByLuId($luid);
                if (!kempty($res)) $checkResult = true;
                break;
            default:
                $checkResult = true;
                break;
        }
    } else {
        $result[] = $tag;
    }

    if ($checkResult) {
        $result[] = $tag;
    }
}

$youpinKey = array_search(LodgeUnitTagsFilterEnum::LU_YOUPIN, $result);
$chaobangKey = array_search(LodgeUnitTagsFilterEnum::LU_CHAOBANG, $result);
if ($youpinKey && $chaobangKey) {
    unset($result[$youpinKey]);
}
print_r($result);