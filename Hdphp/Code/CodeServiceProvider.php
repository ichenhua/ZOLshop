<?php namespace Hdphp\Code;

use Hdphp\Kernel\ServiceProvider;

class CodeServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Code',function($app)
		{
			return new \Hdphp\Code\Code($app);
		},true);
	}
}