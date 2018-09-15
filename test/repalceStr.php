<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/7/7
 * Time: 下午9:20
 */

$tmp = "<xml><ToUserName><![CDATA[gh_de645a96b758]]></ToUserName>
                    <FromUserName><![CDATA[ow4mm0QRrMGHkkJDN2TwOhobupUw]]></FromUserName>
                    <CreateTime>1530941830</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                </xml>";

$input = 'hello';
$postStr = str_replace('text', $input, $tmp);
echo $postStr;