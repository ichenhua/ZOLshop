<?php namespace Hdphp\Dir;

use Hdphp\Kernel\ServiceProvider;

class DirServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Dir',function($app)
		{
			return new \Hdphp\Dir\Dir($app);
		});
	}
}