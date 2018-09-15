<?php

class ProtocolTool
{
    public static $serviceConfig = array(
        'remind' => array('serverhost' => 'dev-xzweb-19.xiaozhu.com', 'serverport' => '80')
    );
    public static $serviceTimeOut = 30;

    public function createRemindByBiz($request)
    {
        $data = self::request('remind', 'post', $request);
        return $data;
    }

    public function getUserById($request)
    {
        $data = self::request('user', 'json', $request);
        if ($data->content) {
            return $data->content;
        }
        return false;
    }

    public static function request($project, $requestMethod, $requestEntity)
    {
        if (!is_object($requestEntity)) {
            throw new BizException('Argument (parameter) exception!!!');
        }

        $requestClass = get_class($requestEntity);

        $responseClass = str_replace('Request', 'Response', $requestClass);

        if (!class_exists($requestClass)) {
            throw new BizException('Configuration exception!!!');
        }

        // 请求url
        $url = self::getBaseUrl($project, $requestEntity);
        $jsonStr = $requestClass::encode($requestEntity);

        try {
            list($isSuccess, $errorMsg) = $requestEntity->checkParams();
            if (!$isSuccess) {
                echo 'zhazha';
            }

            // 请求处理
            $result = self::doAction($url, 'post', $jsonStr);

            $responseClassObj = json_decode($result);

            if (is_null($responseClassObj) || !isset($responseClassObj->status)) {
                print('接口返回格式错误!');
            }

            $result = $responseClass::decode($result);
            var_dump($result);
            exit;
            return $result;
        } catch (\Exception $e) {
            throw new \Exception('file_get_contents exception!!!' . $e->getMessage());
        }
    }

    public static function getBaseUrl($project, $requestEntity)
    {
        $serviceConfig = self::$serviceConfig;
        $config = $serviceConfig[$project];
        $url = 'http://' . $config['serverhost'] . ':' . $config['serverport'] . $requestEntity->getBaseUrl();
        return $url;
    }

    public function pushSendData($data, $terminalType)
    {
        $queueName = $this->getQueueNameByTerminalType($terminalType);
        (new DefaultLogger(EnvSetting::$tmpDir . 'pushSendData/'))->api(json_encode([$queueName, $data]));
        $data = RedisProtocolBase::lpushSendData($queueName, $data);
        return $data;
    }

    public static function doAction($url, $requestMethod, $jsonStr)
    {
        switch ($requestMethod) {
            case 'post':
                $result = self::doPost($url, json_decode($jsonStr, true));
                break;
            case 'json':
                $result = self::doJson($url, $jsonStr);
                break;
            default:
                $result = self::doGet($url, json_decode($jsonStr, true));
        }
        return $result;
    }

    /**
     * @param $url
     * @param $data
     * @return mixed|string
     */
    public static function doPost($url, $data)
    {
        $dataString = self::parameterToString($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$serviceTimeOut);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_URL, $url);
        var_dump($dataString);exit;
        $ret = curl_exec($ch);
        print_r($ret);
        exit;
//        print_r($ret);exit;
        if ($ret === false) {
            if (curl_errno($ch) == CURLE_OPERATION_TIMEDOUT) {
                return 'time out';
            }
        }
        curl_close($ch);
        return $ret;
    }

    /**
     * @param $url
     * @param $data
     * @return mixed|string
     */
    public static function doGet($url, $data)
    {
        var_dump($data);exit();
        $dataString = self::parameterToString($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$serviceTimeOut);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_URL, $url);
        $ret = curl_exec($ch);
        if ($ret === false) {
            if (curl_errno($ch) == CURLE_OPERATION_TIMEDOUT) {
                return 'interlayer link time out';
            }
        }
        curl_close($ch);
        return $ret;
    }

    /**
     * @param $url
     * @param $data
     * @return mixed|string
     */
    public static function doJson($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$serviceTimeOut);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);
        $ret = curl_exec($ch);
        if ($ret === false) {
            if (curl_errno($ch) == CURLE_OPERATION_TIMEDOUT) {
                return 'interlayer link time out';
            }
        }
        curl_close($ch);
        return $ret;
    }

    public static function parameterToString($fieldsArray)
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
