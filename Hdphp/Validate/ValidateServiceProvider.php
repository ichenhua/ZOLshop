<?php namespace Hdphp\Validate;

use Hdphp\Validate\Validate;
use Hdphp\Kernel\ServiceProvider;

class ValidateServiceProvider extends ServiceProvider{

	//延迟加载
	public $defer=true;

	public function boot()
	{
		$_SESSION['_validate']='';
	}

	public function register()
	{
		$this->app->single('Validate',function()
		{
			return new \Hdphp\Validate\Validate();
		});
	}
}