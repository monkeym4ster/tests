<?php

$maxExecPerMinute = 12000;
$maxExecPerMinute -= 2000;
$count = 330900;
$mod = $count % $maxExecPerMinute;
$num = ($count - $mod) / $maxExecPerMinute;

$now = time();
for ($i = 0; $i <= $num; $i++) {
    echo $now . "\n";
    $sleepTime = 1 - (time() - $now);

    if ($sleepTime > 0) {
        var_dump($sleepTime);
        sleep($sleepTime);
    }
    if ($i != $num) {
        echo $i * $maxExecPerMinute . "\n";
        echo $maxExecPerMinute . "\n";
    } else {
        echo $i * $maxExecPerMinute . "\n";
        echo $mod . "\n";
    }
    $total = 1;
    for ($j = 1; $j < 100000000; $j++) {
        $total *= $j;
    }
    echo $total . "\n";
    $now = time();
}