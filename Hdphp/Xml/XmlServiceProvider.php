<?php namespace Hdphp\Xml;

use Hdphp\Xml\Xml;
use Hdphp\Kernel\ServiceProvider;

class XmlServiceProvider extends ServiceProvider{

	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Xml',function()
		{
			return new \Hdphp\Xml\Xml();
		});
	}
}