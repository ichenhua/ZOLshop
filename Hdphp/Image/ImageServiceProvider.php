<?php namespace Hdphp\Image;

use Hdphp\Kernel\ServiceProvider;

class ImageServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Image',function($app)
		{
			return new \Hdphp\Image\Image($app);
		});
	}
}