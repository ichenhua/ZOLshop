<?php namespace Hdphp\View;

use Hdphp\View\View;
use Hdphp\Kernel\ServiceProvider;

class ViewServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('View',function($app)
		{
			return new View($app);
		},true);
	}
}