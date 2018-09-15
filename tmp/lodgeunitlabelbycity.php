<?php

set_time_limit(3600 * 24);
require_once(dirname(__FILE__) . "/../../../inc/assembly.php");
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);

$seCities = LodgeUnit4Se::querySeCities();
foreach ($seCities as $city) {
    $cityId = $city['cityId'];
    $labelResult = shell_exec("/usr/local/xzsoft/php/bin/php " . EnvSetting::$scriptDir . "/crontab/lodgeunit4se/lodgeunitlabel.php " . $cityId);
}
