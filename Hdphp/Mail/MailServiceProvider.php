<?php namespace Hdphp\Mail;

use Hdphp\Mail\Mail;
use Hdphp\Kernel\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
	
	//延迟加载
	public $defer=true;

	public function boot()
	{
	}

	public function register()
	{
		$this->app->single('Mail',function ($app){
			return new Mail($app);
		},true);
	}
}