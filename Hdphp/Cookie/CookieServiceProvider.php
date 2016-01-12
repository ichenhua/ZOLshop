<?php namespace Hdphp\Cookie;

use Hdphp\Kernel\ServiceProvider;

class CookieServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Cookie',function($app)
		{
			return new \Hdphp\Cookie\Cookie($app);
		},true);
	}
}