<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/9/13
 * Time: 下午6:29
 */

$idCardNo = '510122920229539';
$code = substr($idCardNo,14,1);
echo $code%2==0?'女':'男' . "\n";
