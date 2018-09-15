<?php
set_time_limit(3600 * 24);
require_once(dirname(__FILE__) . "/../../../inc/assembly.php");
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);

$cityId = null;
if ($argc > 0) {
    $cityId = $argv[1];
} else {
    echo " cityId is null \n";
    exit;
}

$configObj = new LodgeUnitLabelConfig();
$nearMetroConfig = $configObj->getConfigIdByLabelIndex(LodgeUnitTagsFilterEnum::LU_JINLINDITIE);
$shoppingConvenientConfig = $configObj->getConfigIdByLabelIndex(LodgeUnitTagsFilterEnum::LU_GOUWUBIANLI);

$nearMetroConfigId = $nearMetroConfig['id'];
$shoppingConvenientConfigId = $shoppingConvenientConfig['id'];
if (empty($nearMetroConfigId) || empty($shoppingConvenientConfigId)) {
    echo "labelconfig data false \n";
    exit;
}

$lodgeUnitLabelObj = new LodgeUnitLabelActiveRecord();
$baiduPOILabel = new BaiDuPOI4LodgeUnitLabel();
$lodgeUnits = LodgeUnit4Se::querySeLodgeUnits($cityId);
foreach ($lodgeUnits as $lodgeUnit) {
    $nearMetroResult = $baiduPOILabel->doSearchSubway($lodgeUnit['latlng']);
    if ($nearMetroResult) {
        $lodgeUnitLabelObj->doUpdateLodgeUnitLabel($lodgeUnit['luId'], $nearMetroConfigId);
        echo $lodgeUnit['luId'] . " " . $nearMetroConfigId . "\n";
    }

    $shoppingConvenientResult = $baiduPOILabel->doSearchShopping($lodgeUnit['latlng']);
    if ($shoppingConvenientResult) {
        $lodgeUnitLabelObj->doUpdateLodgeUnitLabel($lodgeUnit['luId'], $shoppingConvenientConfigId);
        echo $lodgeUnit['luId'] . " " . $shoppingConvenientConfigId . "\n";
    }
}