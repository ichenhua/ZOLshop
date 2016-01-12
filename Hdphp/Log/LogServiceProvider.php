<?php namespace Hdphp\Log;

use Hdphp\Log\Log;
use Hdphp\Kernel\ServiceProvider;

class LogServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
		
	}

	public function register()
	{
		$this->app->single('Log',function($app)
		{
			return new Log($app);
		},true);
	}
}