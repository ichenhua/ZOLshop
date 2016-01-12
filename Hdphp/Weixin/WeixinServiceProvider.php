<?php namespace Hdphp\Weixin;

use Hdphp\Kernel\ServiceProvider;

class WeixinServiceProvider extends ServiceProvider{

	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Weixin',function()
		{
			return new \Hdphp\Weixin\Weixin();
		});
	}
}