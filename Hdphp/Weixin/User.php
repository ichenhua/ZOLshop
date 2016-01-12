<?php namespace Hdphp\Weixin;

//会员管理
class User extends Weixin
{
    //设置备注名
    public function setRemark($param)
    {
        $url = $this->apiUrl . '/cgi-bin/user/info/updateremark?access_token=' . $this->getAccessToken();

        $content = Curl::post($url, urldecode(json_encode($this->urlencodeArray($param))));

        $result = json_decode($content, true);

        return $this->get($result);
    }

    //获取用户基本信息
    public function getUserInfo($openid)
    {
        $url = $this->apiUrl . '/cgi-bin/user/info?openid={$openid}&lang=zh_CN&access_token=' . $this->getAccessToken();

        $content = Curl::get($url);

        $result = json_decode($content, true);

        return $this->get($result);
    }

    //批量获取用户基本信息
    public function getUserInfoLists($param)
    {
        $url = $this->apiUrl . '/cgi-bin/user/info/batchget?access_token=' . $this->getAccessToken();

        $content = Curl::post($url, urldecode(json_encode($this->urlencodeArray($param))));

        $result = json_decode($content, true);

        return $this->get($result);
    }

    //获取用户列表
    public function getUserLists($next_openid='')
    {
        $url = $this->apiUrl . "/cgi-bin/user/get?access_token={$this->access_token}&next_openid={$next_openid}";

        $content = Curl::get($url);

        $result = json_decode($content, true);

        return $this->get($result);
    }
}