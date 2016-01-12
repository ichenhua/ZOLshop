<?php namespace Hdphp\Cart;

use Hdphp\Kernel\ServiceProvider;

class CartServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Cart',function($app)
		{
			return new \Hdphp\Cart\Cart($app);
		});
	}
}