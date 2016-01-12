<?php namespace Hdphp\Arr;

use Hdphp\Arr\Arr;
use Hdphp\Kernel\ServiceProvider;

class ArrServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{

	}

	public function register()
	{
		$this->app->single('Arr',function($app)
		{
			return new Arr($app);
		});
	}
}