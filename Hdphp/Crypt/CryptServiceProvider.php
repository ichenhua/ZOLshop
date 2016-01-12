<?php namespace Hdphp\Crypt;

use Hdphp\Kernel\ServiceProvider;

class CryptServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Crypt',function($app)
		{
			return new \Hdphp\Crypt\Crypt($app);
		},true);
	}
}