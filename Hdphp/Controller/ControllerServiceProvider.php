<?php namespace Hdphp\Controller;

use Hdphp\Controller\Controller;
use Hdphp\Kernel\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
		
	}

	public function register()
	{
		$this->app->single('Controller','Hdphp\Controller\Controller',true);
	}
}