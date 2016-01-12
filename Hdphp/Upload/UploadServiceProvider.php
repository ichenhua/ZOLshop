<?php namespace Hdphp\Upload;

use Hdphp\Kernel\ServiceProvider;

class UploadServiceProvider extends ServiceProvider{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Upload',function($app)
		{
			return new \Hdphp\Upload\Upload($app);
		});
	}
}