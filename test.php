<?php

$arr = [1, 2];
echo '(' . implode(',', $arr) . ")\n";

function kempty($var)
{
    return !(isset($var) && !empty($var) && !is_null($var));
}
var_dump(kempty(false));