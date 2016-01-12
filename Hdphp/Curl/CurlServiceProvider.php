<?php namespace Hdphp\Curl;

use Hdphp\Kernel\ServiceProvider;

class CurlServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Curl',function($app)
		{
			return new \Hdphp\Curl\Curl($app);
		},true);
	}
}