<?php namespace Hdphp\Error;

use Hdphp\Error\Error;
use Hdphp\Kernel\ServiceProvider;

class ErrorServiceProvider extends ServiceProvider
{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
		$this->app['Error']->bootstrap();
	}

	public function register()
	{
		$this->app->single('Error',function ($app){
			return new Error($app);
		},true);
	}
}