<?php namespace Hdphp\Route;

use Hdphp\Kernel\ServiceProvider;

class RouteServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{

	}

	public function register()
	{
		$this->app->single('Route',function($app)
		{
			return new Route($app);
		},true);
	}
}