<?php namespace Hdphp\Cache;

use Hdphp\Kernel\ServiceProvider;

/**
 * 缓存服务提供者
 * Class CacheServiceProvider
 *
 * @package Hdphp\Cache
 * @author  向军 <2300071698@qq.com>
 */
class CacheServiceProvider extends ServiceProvider
{

    //延迟加载
    public $defer = true;

    public function boot()
    {
    }

    public function register()
    {
        $this->app->single(
            'Cache', function ($app)
        {
            return new Cache($app);
        }
        );
    }
}