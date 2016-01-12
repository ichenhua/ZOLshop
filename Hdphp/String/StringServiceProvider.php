<?php namespace Hdphp\String;

use Hdphp\Kernel\ServiceProvider;

class StringServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('String',function($app)
		{
			return new \Hdphp\String\String($app);
		});
	}
}