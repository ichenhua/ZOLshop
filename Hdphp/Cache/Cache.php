<?php namespace Hdphp\Cache;

/**
 * 缓存处理基类
 * Class Cache
 *
 * @package Hdphp\Cache
 * @author  向军 <2300071698@qq.com>
 */
class Cache
{

    //应用
    public $app;

    //连接
    protected $connect;

    public function __construct($app)
    {
        $this->app     = $app;
        $driver        = '\Hdphp\Cache\\' . ucfirst(Config::get('cache.type'));
        $this->connect = new $driver;
    }

    //更改缓存驱动
    public function driver($driver)
    {
        $driver        = '\Hdphp\Cache\\' . ucfirst($driver);
        $this->connect = new $driver;

        return $this;
    }

    public function __call($method, $params)
    {
        if (method_exists($this->connect, $method))
        {
            return call_user_func_array(array($this->connect, $method), $params);
        }
        else
        {
            return $this;
        }
    }

}