<?php namespace Hdphp\Data;

use Hdphp\Kernel\ServiceProvider;

class DataServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Data',function($app)
		{
			return new \Hdphp\Data\Data($app);
		});
	}
}