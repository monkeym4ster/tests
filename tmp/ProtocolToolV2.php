<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/5/28
 * Time: 下午8:18
 */

class ProtocolToolV2
{
    private $url = 'http://dev-xzweb-19.xiaozhu.com:80/remind.php?op=createRemindByBiz';
    private $timeout = 30;

    public function createRemindByBiz($req)
    {

        $req = json_decode(json_encode($req), true);
//        print_r($req);exit;
        $result = $this->doAction($req);
        return $result;
    }

    function doAction($req)
    {
//        var_dump($req);exit;
        $req = $this->parameterToString($req);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_URL, $this->url);
//        var_dump($req);exit;
        $ret = curl_exec($ch);

        if ($ret === false) {
            if (curl_errno($ch) == CURLE_OPERATION_TIMEDOUT) {
                return 'time out';
            }
        }
        curl_close($ch);
        return $ret;
    }

    public function parameterToString($fieldsArray)
    {
        if (empty($fieldsArray)) {
            return '';
        }
        // 去掉baseUrl
        if (isset($fieldsArray['baseUrl'])) {
            unset($fieldsArray['baseUrl']);
        }
        // 字符串的要urlencode
        foreach ($fieldsArray as $k => &$v) {
            if (is_string($v)) {
                $v = urlencode($v);
            }
        }

        return http_build_query($fieldsArray);
    }
}