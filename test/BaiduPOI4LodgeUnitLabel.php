<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/7/4
 * Time: 上午10:11
 */

set_time_limit(3600 * 24);
ini_set('memory_limit', 1024 * 1024 * 1024 * 2);

$lodgeUnit = ['id' => 10779800, 'latlng' => '39.924961,116.348518'];        //两个都没
$lodgeUnit2 = ['id' => 13284464, 'latlng' => '39.983135,116.319016'];       //有商场
$lodgeUnit3 = ['id' => 21133500, 'latlng' => '40.077923,116.343742'];       //两个都有

$baiduPOILabel = new BaiDuPOI4LodgeUnitLabel();

$nearMetroResult = $baiduPOILabel->doSearchSubway($lodgeUnit3['latlng']);
$shoppingConvenientResult = $baiduPOILabel->doSearchShopping($lodgeUnit3['latlng']);

if ($nearMetroResult) echo 1;
if ($shoppingConvenientResult) echo 2;

class BaiDuPOI4LodgeUnitLabel
{
    const APIURL = 'http://api.map.baidu.com/place/v2/search?';
    const OUTPUT = 'json';
    const AK = 'F5Dn3bVpbsNBhLPiN7kwOS3hDCHYadGU';
    const RETURNSCOPE = 2;     //1数据返回较少,2返回带detail_info
    const COORDTYPE = 3;
    const PAGESIZE = 20;
    const TIMEOUT = 60;
    const SUBWAY = '地铁站';
    const SUBWAYRADIUS = '300';
    const SHOPPINGCENTER = '购物中心';
    const MALL = '百货商场';
    const SUPERMARKET = '超市';
    const QUERYSHOPPING = '购物中心&百货商场&超市';
    const SHOPPINGRADIUS = '500';

    public function doSearchSubway($latlng)
    {
        $params = array(
            'query' => self::SUBWAY,
            'location' => $latlng,
            'radius' => self::SUBWAYRADIUS,
            'output' => self::OUTPUT,
            'scope' => self::RETURNSCOPE,
            'coord_type' => self::COORDTYPE,
            'page_size' => self::PAGESIZE,
            'ak' => self::AK,
        );

        $result = $this->doCurlGet($params);
        print_r($result);
        if (!empty($result['total'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doSearchShopping($latlng)
    {
        $params = array(
            'query' => self::QUERYSHOPPING,
            'location' => $latlng,
            'radius' => self::SUBWAYRADIUS,
            'output' => self::OUTPUT,
            'scope' => self::RETURNSCOPE,
            'coord_type' => self::COORDTYPE,
            'page_size' => self::PAGESIZE,
            'ak' => self::AK,
        );

        $result = $this->doCurlGet($params);
        print_r($result);
        if (!empty($result['total']) && !empty($result['results'])) {
            foreach ($result['results'] as $detail) {
                if (!empty($detail['detail_info']) && !empty($tag = $detail['detail_info']['tag']) && (strpos($tag, self::SHOPPINGCENTER) == true || strpos($tag, self::MALL) == true || strpos($tag, self::SUPERMARKET) == true))
                    return true;
            }
        }
        return false;
    }

    public function doCurlGet($params)
    {
        $conditions = array();
        foreach ($params as $key => $param) {
            $conditions[] = $key . '=' . $param;
        }
        $url = self::APIURL . implode('&', $conditions);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::TIMEOUT);
        $output = curl_exec($ch);
        $result = json_decode($output, true);
        curl_close($ch);
        return $result;
    }
}
