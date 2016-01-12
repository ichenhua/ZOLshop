<?php namespace Hdphp\Html;

use Hdphp\Kernel\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Html',function($app)
		{
			return new \Hdphp\Html\Html($app);
		});
	}
}