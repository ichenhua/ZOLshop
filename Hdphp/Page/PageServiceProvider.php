<?php namespace Hdphp\Page;

use Hdphp\Kernel\ServiceProvider;

class PageServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Page',function($app)
		{
			return new \Hdphp\Page\Page($app);
		},true);
	}
}