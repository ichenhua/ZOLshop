<?php namespace Hdphp\Lang;

use Hdphp\Lang\Lang;
use Hdphp\Kernel\ServiceProvider;

class LangServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{

	}

	public function register()
	{
		$this->app->single('Lang',function($app)
		{
			return new Lang($app);
		});
	}
}