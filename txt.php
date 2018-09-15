<?php

echo memory_get_usage() / 1024 . "\n";
$lodgeUnitId = 17616130503;
$lodgeUnitIds = json_decode(file_get_contents('addXianYuDiscountLodgeUnits.txt'),true);

var_dump($lodgeUnitIds);

echo memory_get_usage() / 1024 . "\n";
echo memory_get_usage(true) . "\n";