<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/8/3
 * Time: 下午2:17
 */

function kempty($var)
{
    return !(isset($var) && !empty($var) && !is_null($var));
}
