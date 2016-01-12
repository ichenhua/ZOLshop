<?php namespace Hdphp\Request;

use Hdphp\Kernel\ServiceProvider;

class RequestServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Request',function($app)
		{
			return new \Hdphp\Request\Request($app);
		});
	}
}