<?php namespace Hdphp\Url;

use Hdphp\Url\Url;
use Hdphp\Kernel\ServiceProvider;

class UrlServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=false;

	public function boot()
	{

	}

	public function register()
	{
		$this->app->single('Url',function($app)
		{
			return new Url($app);
		},true);
	}
}