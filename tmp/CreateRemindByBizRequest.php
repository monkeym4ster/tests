<?php

class CreateRemindByBizRequest
{
    public $baseUrl = '/remind.php?op=createRemindByBiz';
    public $bizId = '';
    public $bizType = '';
    public $replaceText = '';
    public $remindEventNo = '';
    public $remindReceiver = '';
    public $removeEventNo = '';

    public function getBizId()
    {
        return $this->bizId;
    }

    public function setBizId($bizId)
    {
        $this->bizId = $bizId;
    }

    public function getBizType()
    {
        return $this->bizType;
    }

    public function setBizType($bizType)
    {
        $this->bizType = $bizType;
    }

    public function getReplaceText()
    {
        return $this->replaceText;
    }

    public function setReplaceText($replaceText)
    {
        $this->replaceText = $replaceText;
    }

    public function getRemindEventNo()
    {
        return $this->remindEventNo;
    }

    public function setRemindEventNo($remindEventNo)
    {
        $this->remindEventNo = $remindEventNo;
    }

    public function getRemindReceiver()
    {
        return $this->remindReceiver;
    }

    public function setRemindReceiver($remindReceiver)
    {
        $this->remindReceiver = $remindReceiver;
    }

    public function getRemoveEventNo()
    {
        return $this->removeEventNo;
    }

    public function setRemoveEventNo($removeEventNo)
    {
        $this->removeEventNo = $removeEventNo;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public static function encode($createRemindByBizRequest)
    {

        return json_encode($createRemindByBizRequest);
    }

    public static function decode($str)
    {
        if ($str == null || $str == '') {
            return null;
        }
        $objArray = json_decode($str, true);
        $createRemindByBizRequest = new CreateRemindByBizRequest();
        $createRemindByBizRequest->setBizId($objArray['bizId']);
        $createRemindByBizRequest->setBizType($objArray['bizType']);
        $createRemindByBizRequest->setReplaceText($objArray['replaceText']);
        $createRemindByBizRequest->setRemindReceiver($objArray['remindReceiver']);
        $createRemindByBizRequest->setRemindEventNo($objArray['remindEventNo']);
        $createRemindByBizRequest->setRemoveEventNo($objArray['removeEventNo']);
        return $createRemindByBizRequest;
    }

    public function checkParams()
    {
        $white = ['removeEventNo'];
        $mustArr = ['replaceText', 'replaceText', 'remindEventNo'];
        $arrObj = get_object_vars($this);
        foreach ($arrObj as $key => $value) {
            if (in_array($key, $white)) continue;
            if (!$value) {
                return array(false,"参数{$key}不能为空，请重新检查参数!");
            }
            if (in_array($key, $mustArr) && !is_array($value)) {
                return array(false,"参数" . $key . "应为数组格式！");
            }
        }
        return array(true,'ok');
    }
}
