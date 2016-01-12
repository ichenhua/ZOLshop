<?php namespace Hdphp\Cache;

/**
 * 缓存处理接口
 * Interface InterfaceCache
 *
 * @package Hdphp\Cache
 * @author  向军 <2300071698@qq.com>
 */
interface InterfaceCache
{
    public function connect();

    public function set($name, $value, $expire);

    public function get($name);

    public function del($name);

    public function flush();
}