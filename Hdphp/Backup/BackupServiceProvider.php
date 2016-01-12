<?php namespace Hdphp\Backup;


use Hdphp\Kernel\ServiceProvider;

/**
 * 数据库备份服务
 * Class BackupServiceProvider
 *
 * @package Hdphp\Backup
 * @author  向军 <2300071698@qq.com>
 */
class BackupServiceProvider extends ServiceProvider
{

    //延迟加载
    public $defer = true;

    public function boot()
    {
    }

    public function register()
    {
        $this->app->single(
            'Backup', function ($app)
        {
            return new \Hdphp\Backup\Backup($app);
        }
        );
    }
}