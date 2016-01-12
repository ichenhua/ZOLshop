<?php namespace Hdphp\Session;

use Hdphp\Session\Session;
use Hdphp\Kernel\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{

    //延迟加载
    public $defer = false;

    public function boot()
    {
        \Session::make();

    }

    public function register()
    {
        $this->app->single(
            'Session', function ($app)
        {
            return new Session($app);
        }
        );
    }
}