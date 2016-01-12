<?php namespace Hdphp\Weixin;

class Weixin extends Error
{
    //TOKEN定义
    protected static $token;

    protected static $appID;

    protected static $appsecret;

    //access_token
    protected $access_token;

    //微信 服务器发来的数据
    protected $message;

    //API 根地址
    protected $apiUrl = 'https://api.weixin.qq.com';

    public function __construct()
    {
        $this->access_token = $this->getAccessToken();
        //处理 微信服务器 发来的数据
        $this->message = $this->parsePostRequestData();
    }

    //获取微信服务器发来的消息（官网消息或用户消息)
    public function getMessage()
    {
        return $this->message;
    }

    //解析微信发来的POST/XML数据
    private function parsePostRequestData()
    {
        if (isset($GLOBALS['HTTP_RAW_POST_DATA']))
        {
            $post = $GLOBALS['HTTP_RAW_POST_DATA'];

            return simplexml_load_string($post, 'SimpleXMLElement', LIBXML_NOCDATA);
        }
    }

    //微信接口整合验证进行绑定
    public function valid()
    {
        if ( ! isset($_GET["echostr"]) || ! isset($_GET["signature"]) || ! isset($_GET["timestamp"]) || ! isset($_GET["nonce"]))
        {
            return false;
        }

        $echoStr   = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce     = $_GET["nonce"];
        $token     = self::$token;
        $tmpArr    = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature)
        {
            echo $echoStr;
            exit;
        }
        else
        {
            return false;
        }
    }


    //设置appID
    public function appID($appID)
    {
        self::$appID = $appID;

        return $this;
    }

    //设置appsecret
    public function appsecret($appsecret)
    {
        self::$appsecret = $appsecret;

        return $this;
    }

    //设置 TOKEN
    public function setToken($token)
    {
        self::$token = $token;

        return $this;
    }

    /**
     * 获取accessToken
     * access_token是公众号的全局唯一票据，公众号调用各接口时都需使用access_token。开发者需要进行妥善保存。access_token的存储
     * 至少要保留512个字符空间。access_token的有效期目前为2个小时，需定时刷新，重复获取将导致上次获取的access_token失效，
     * 每天可获取2000次
     * 服务器返回的 access_token 过期时间，一般2小时
     */
    public function getAccessToken($cacheKey = '')
    {
        $cacheKey = $cacheKey ?: 'access_token';

        if ($token = Cache::dir('storage/weixin')->get($cacheKey))
        {
            $this->access_token = $token;

            return $token;
        }

        $url = $this->apiUrl . '/cgi-bin/token?grant_type=client_credential&appid=' . self::$appID . '&secret=' . self::$appsecret;

        $data = Curl::get($url);

        $json = json_decode($data, true);

        if (array_key_exists('errcode', $json) && $json['errcode'] != 0)
        {
            //获取失败
            return false;
        }
        else
        {
            $this->access_token = $json['access_token'];
            $this->expires_in   = (int)$json['expires_in'];
            //应该保存缓存。。。
            Cache::dir('storage/weixin')->set($cacheKey, $this->access_token, 7000);

            return $this->access_token;
        }
    }

    //将数据中的中文转url编码，因为微信不能识别\uxxx json_encode后的中文
    protected function urlencodeArray($data)
    {
        $result = array();
        foreach ($data as $i => $d)
        {
            $result[urlencode($i)] = is_array($d) ? $this->urlencodeArray($d) : urlencode($d);
        }

        return $result;
    }

    //获取实例
    public function instance($type)
    {
        switch ($type)
        {
            case 'message':
                //消息管理
                return new \Hdphp\Weixin\Message;
            case 'qrcode':
                //二维码
                return new \Hdphp\Weixin\Qrcode;
            case 'customservice':
                //客服
                return new \Hdphp\Weixin\CustomService;
            case 'button':
                //自定义菜单
                return new \Hdphp\Weixin\Button;
            case 'material':
                //素材管理
                return new \Hdphp\Weixin\Material;
            case 'group':
                //会员组管理
                return new \Hdphp\Weixin\Group;
            case 'user':
                //会员管理
                return new \Hdphp\Weixin\User;
        }
    }

}