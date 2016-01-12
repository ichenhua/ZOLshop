<?php namespace Hdphp\Response;

use Hdphp\Kernel\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Response',function($app)
		{
			return new \Hdphp\Response\Response($app);
		});
	}
}