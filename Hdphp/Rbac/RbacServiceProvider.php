<?php namespace Hdphp\Rbac;

use Hdphp\Rbac\Rbac;
use Hdphp\Kernel\ServiceProvider;

class RbacServiceProvider extends ServiceProvider{

	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Rbac',function()
		{
			return new \Hdphp\Rbac\Rbac();
		});
	}
}